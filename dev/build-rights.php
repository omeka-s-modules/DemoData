<?php
/**
 * Fetch rights/license information from Wikimedia Commons for each media entry
 * and inject it as dcterms:rights into the dataset PHP file.
 *
 * Requires items to have a Wikidata QID in dcterms:identifier. Datasets without
 * QIDs (e.g. documents) are not supported.
 *
 * Usage:
 *   php dev/build-rights.php <dataset>           # fetch and inject
 *   php dev/build-rights.php <dataset> --dry-run # report only, no writes
 *
 * Re-running is safe — media entries that already have dcterms:rights are skipped.
 */
$args = array_slice($argv, 1);
$positional = array_values(array_filter($args, fn ($a) => !str_starts_with($a, '-')));

if (!$positional) {
    fwrite(STDERR, "Usage: php dev/build-rights.php <dataset> [--dry-run]\n");
    exit(1);
}

(new RightsBuilder($positional[0], in_array('--dry-run', $args)))->run();

class RightsBuilder
{
    private const SPARQL_DELAY = 2.0;
    private const COMMONS_DELAY = 0.5;
    // Datasets without Wikidata QIDs — Commons filenames cannot be re-derived.
    private const NO_QID_DATASETS = ['documents'];

    private string $dataset;
    private string $dataFile;
    private bool $dryRun;
    private string $userAgent;
    private ?string $oauthToken = null;
    private float $lastSparqlTime = 0.0;
    private float $lastCommonsTime = 0.0;
    private bool $rateLimited = false;

    public function __construct(string $dataset, bool $dryRun)
    {
        $this->dataset = $dataset;
        $root = dirname(__DIR__);
        $this->dataFile = "$root/datasets/$dataset/$dataset.php";
        $this->dryRun = $dryRun;

        $configFile = __DIR__ . '/config.php';
        $config = file_exists($configFile) ? require $configFile : [];
        $this->userAgent = $config['wikidata_user_agent']
            ?? 'omeka-s/DemoData-module build-rights/1.0 (https://omeka.org)';
        $this->oauthToken = $config['wikidata_access_token'] ?? null;
    }

    public function run(): void
    {
        if (in_array($this->dataset, self::NO_QID_DATASETS)) {
            fwrite(STDERR, "Skipping {$this->dataset}: no Wikidata QIDs — Commons filenames cannot be re-derived automatically.\n");
            exit(1);
        }

        if (!file_exists($this->dataFile)) {
            fwrite(STDERR, "Dataset not found: {$this->dataFile}\n");
            exit(1);
        }

        $data = require $this->dataFile;
        $items = $data['items'] ?? [];

        $pendingQid = [];   // items with a QID and incomplete rights
        $pendingNoQid = []; // items with media, no QID, and incomplete rights
        $done = 0;
        $noMedia = 0;

        foreach ($items as $item) {
            if (empty($item['media'])) {
                $noMedia++;
                continue;
            }
            if ($this->allEntriesHaveRights($item['media'])) {
                $done++;
                continue;
            }
            $qid = $this->extractQid($item);
            if ($qid) {
                $pendingQid[] = $item;
            } else {
                $pendingNoQid[] = $item;
            }
        }

        $total = count($items);
        $pending = count($pendingQid) + count($pendingNoQid);
        echo "Dataset: {$this->dataset} | Items: $total | Done: $done | No media: $noMedia | Pending: $pending\n";

        if (!$pending) {
            echo "Nothing to do.\n";
            return;
        }

        // Load strategy file for commons_file_overrides
        $strategyFile = __DIR__ . "/strategies/{$this->dataset}.php";
        $strategy = file_exists($strategyFile) ? require $strategyFile : [];
        $commonsFileOverrides = [];
        foreach ($strategy as $pass) {
            if (isset($pass['commons_file_overrides'])) {
                $commonsFileOverrides = array_merge($commonsFileOverrides, $pass['commons_file_overrides']);
            }
        }

        // Phase 1: SPARQL P18 → filename map
        $filenameMap = []; // id => commons filename

        if ($pendingQid) {
            $qidMap = [];
            foreach ($pendingQid as $item) {
                $qidMap[$item['id']] = $this->extractQid($item);
            }

            $urlMap = $this->fetchImagesByQidMap($qidMap);
            foreach ($urlMap as $id => $url) {
                $filenameMap[$id] = rawurldecode(basename(parse_url($url, PHP_URL_PATH)));
            }
        }

        // Phase 2: Fallback — Commons search for items P18 didn't resolve
        $unresolved = [];
        foreach ($pendingQid as $item) {
            if (!isset($filenameMap[$item['id']])) {
                $unresolved[] = $item;
            }
        }
        foreach ($pendingNoQid as $item) {
            $unresolved[] = $item;
        }

        if ($unresolved) {
            echo "Commons search fallback (" . count($unresolved) . " items)\n";
            $fallbackFilenames = $this->fetchFilenamesFallback($unresolved, $commonsFileOverrides);
            foreach ($fallbackFilenames as $id => $filename) {
                $filenameMap[$id] = $filename;
            }
        }

        // Phase 3: Fetch extmetadata and build rights map
        $rightsMap = []; // id => rights string
        foreach ($filenameMap as $id => $filename) {
            $meta = $this->fetchExtmetadata($filename);
            if ($meta === null) {
                fwrite(STDERR, "  No metadata: $id ($filename)\n");
                continue;
            }
            $rights = $this->formatRights($meta);
            if ($rights === null) {
                fwrite(STDERR, "  No license info: $id ($filename)\n");
                continue;
            }
            $rightsMap[$id] = $rights;
            echo "  $id: '$rights' (via '$filename')\n";
        }

        echo "\nResolved: " . count($rightsMap) . " / $pending\n";

        if ($this->dryRun) {
            echo "(dry run — no files written)\n";
            return;
        }

        if (!$rightsMap) {
            echo "Nothing to inject.\n";
            return;
        }

        $injected = 0;
        foreach ($data['items'] as &$item) {
            $id = $item['id'] ?? null;
            if (!$id || !isset($rightsMap[$id])) {
                continue;
            }
            $item['media'] = $this->injectRights($item['media'], $rightsMap[$id]);
            $injected++;
        }
        unset($item);

        file_put_contents($this->dataFile, "<?php\nreturn " . $this->phpVal($data, 0) . ";\n");
        echo "Updated: {$this->dataFile}\n";
        echo "Injected: $injected\n";
    }

    private function fetchFilenamesFallback(array $items, array $overrides): array
    {
        $filenameMap = [];
        $searchItems = [];

        foreach ($items as $item) {
            $id = $item['id'];
            if (isset($overrides[$id])) {
                $filenameMap[$id] = $overrides[$id];
                echo "  $id: override '{$overrides[$id]}'\n";
            } else {
                $searchItems[] = $item;
            }
        }

        foreach ($searchItems as $item) {
            $id = $item['id'];
            $title = $this->extractScalar($item['dcterms:title'] ?? null);
            $creator = $this->extractScalar($item['dcterms:creator'] ?? null);

            // Try title + creator first, then title only
            $queries = array_filter(array_unique([
                implode(' ', array_filter([$title, $creator])),
                $title,
            ]));

            $found = false;
            foreach ($queries as $query) {
                $filename = $this->commonsSearch($query);
                if ($filename) {
                    $filenameMap[$id] = $filename;
                    echo "  $id: found '$filename'\n";
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                fwrite(STDERR, "  Not found: $id\n");
            }
        }

        echo "  Matched: " . count($filenameMap) . " / " . count($items) . "\n\n";
        return $filenameMap;
    }

    private function extractScalar(mixed $value): ?string
    {
        if (is_string($value)) {
            return $value;
        }
        if (is_array($value)) {
            foreach ($value as $v) {
                if (is_string($v)) {
                    return $v;
                }
                if (is_array($v) && isset($v['@value']) && !isset($v['@language'])) {
                    return $v['@value'];
                }
            }
        }
        return null;
    }

    private function commonsSearch(string $query): ?string
    {
        $url = 'https://commons.wikimedia.org/w/api.php?' . http_build_query([
            'action' => 'query',
            'list' => 'search',
            'srnamespace' => 6,
            'srsearch' => $query,
            'srlimit' => 1,
            'format' => 'json',
        ]);
        $result = $this->commonsGet($url);
        $title = $result['query']['search'][0]['title'] ?? null;
        return $title ? substr($title, 5) : null; // strip "File:" prefix
    }

    private function injectRights(mixed $media, string $rights): mixed
    {
        if (is_string($media)) {
            return ['file' => $media, 'dcterms:rights' => $rights];
        }
        if (is_array($media) && isset($media['file'])) {
            $media['dcterms:rights'] = $rights;
            return $media;
        }
        // Sequential array of dicts (multi-file) — inject into each entry
        return array_map(function ($entry) use ($rights) {
            if (is_string($entry)) {
                $entry = ['file' => $entry];
            }
            $entry['dcterms:rights'] = $rights;
            return $entry;
        }, $media);
    }

    private function allEntriesHaveRights(mixed $media): bool
    {
        if (is_string($media)) {
            return false;
        }
        if (is_array($media) && isset($media['file'])) {
            return isset($media['dcterms:rights']);
        }
        foreach ($media as $entry) {
            if (is_string($entry) || !isset($entry['dcterms:rights'])) {
                return false;
            }
        }
        return true;
    }

    private function extractQid(array $item): ?string
    {
        $identifier = $item['dcterms:identifier'] ?? null;
        $uri = is_array($identifier) ? ($identifier['@value'] ?? null) : $identifier;
        if (!$uri) {
            return null;
        }
        $qid = basename($uri);
        return (str_starts_with($qid, 'Q') && ctype_digit(substr($qid, 1))) ? $qid : null;
    }

    private function fetchImagesByQidMap(array $qidMap): array
    {
        echo "SPARQL P18 lookup (" . count($qidMap) . " items)\n";

        $qidValues = implode(' ', array_map(fn ($q) => "(wd:$q)", array_values($qidMap)));
        $query = "SELECT ?entity ?image WHERE {\n  VALUES (?entity) { $qidValues }\n  ?entity wdt:P18 ?image .\n}";

        $rows = $this->sparql($query);
        echo "  SPARQL returned " . count($rows) . " rows\n";

        $qidToIds = [];
        foreach ($qidMap as $id => $qid) {
            $qidToIds[$qid][] = $id;
        }

        $urlMap = [];
        foreach ($rows as $row) {
            $qid = basename($row['entity']['value'] ?? '');
            $imageUrl = $row['image']['value'] ?? null;
            if (!$imageUrl) {
                continue;
            }
            foreach ($qidToIds[$qid] ?? [] as $id) {
                $urlMap[$id] ??= $imageUrl;
            }
        }

        $missing = array_diff_key($qidMap, $urlMap);
        if ($missing) {
            echo "\nNo P18 image on Wikidata for:\n";
            foreach (array_keys($missing) as $id) {
                echo "  $id\n";
            }
            echo "\n";
        }

        echo "  Matched: " . count($urlMap) . "\n\n";
        return $urlMap;
    }

    private function fetchExtmetadata(string $filename): ?array
    {
        $url = 'https://commons.wikimedia.org/w/api.php?' . http_build_query([
            'action' => 'query',
            'titles' => 'File:' . $filename,
            'prop' => 'imageinfo',
            'iiprop' => 'extmetadata',
            'format' => 'json',
        ]);

        $result = $this->commonsGet($url);
        if (!$result) {
            return null;
        }
        $pages = $result['query']['pages'] ?? [];
        $page = reset($pages);
        return $page['imageinfo'][0]['extmetadata'] ?? null;
    }

    private function formatRights(?array $meta): ?string
    {
        if (!$meta) {
            return null;
        }
        $license = $meta['LicenseShortName']['value'] ?? null;
        if (!$license) {
            return null;
        }
        $artist = html_entity_decode(strip_tags($meta['Artist']['value'] ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $artist = trim(preg_replace('/\s+/', ' ', $artist));
        return $artist !== '' ? "$license | $artist" : $license;
    }

    private function commonsGet(string $url): ?array
    {
        $this->throttle($this->lastCommonsTime, self::COMMONS_DELAY);
        $headers = [];
        if ($this->oauthToken) {
            $headers[] = 'Authorization: Bearer ' . $this->oauthToken;
        }
        for ($attempt = 0; $attempt < 3; $attempt++) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => true,
                CURLOPT_USERAGENT => $this->userAgent,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_TIMEOUT => 10,
            ]);
            $response = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            curl_close($ch);

            if ($response === false) {
                continue;
            }
            $body = substr($response, $headerSize);
            if ($status === 200 && $body) {
                return json_decode($body, true);
            }
            if ($status === 429) {
                $headers = substr($response, 0, $headerSize);
                preg_match('/Retry-After:\s*(\d+)/i', $headers, $m);
                $wait = min(isset($m[1]) ? (int) $m[1] : 60, 120);
                echo "  [rate limit] sleeping {$wait}s\n";
                sleep($wait);
                continue;
            }
            return null;
        }
        return null;
    }

    private function sparql(string $query): array
    {
        $this->throttle($this->lastSparqlTime, self::SPARQL_DELAY);

        $retryAfter = null;
        $headers = ['Accept: application/sparql-results+json'];
        if ($this->oauthToken) {
            $headers[] = 'Authorization: Bearer ' . $this->oauthToken;
        }
        $ch = curl_init('https://query.wikidata.org/sparql');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query(['query' => $query]),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_USERAGENT => $this->userAgent,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HEADERFUNCTION => $this->retryAfterClosure($retryAfter),
        ]);
        $body = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 429) {
            $hint = $retryAfter ? " (Retry-After: {$retryAfter}s)" : '';
            fwrite(STDERR, "SPARQL rate limited{$hint} — wait and re-run.\n");
            $this->rateLimited = true;
            return [];
        }
        if ($status !== 200 || !$body) {
            fwrite(STDERR, "SPARQL error $status\n");
            return [];
        }

        $result = json_decode($body, true);
        return $result['results']['bindings'] ?? [];
    }

    private function retryAfterClosure(?int &$retryAfter): \Closure
    {
        return function ($ch, $header) use (&$retryAfter) {
            if (stripos($header, 'Retry-After:') === 0) {
                $retryAfter = (int) trim(substr($header, 12));
            }
            return strlen($header);
        };
    }

    private function throttle(float &$last, float $delay): void
    {
        $now = microtime(true);
        if ($now - $last < $delay) {
            usleep((int) (($delay - ($now - $last)) * 1_000_000));
        }
        $last = microtime(true);
    }

    private function phpVal(mixed $v, int $depth): string
    {
        $pad  = str_repeat('    ', $depth);
        $ipad = str_repeat('    ', $depth + 1);

        if (is_null($v))  return 'null';
        if (is_bool($v))  return $v ? 'true' : 'false';
        if (is_int($v))   return (string) $v;
        if (is_float($v)) {
            $native = (string) $v;
            $s = rtrim(sprintf('%.10F', $v), '0');
            $s = rtrim($s, '.');
            if (!str_contains($s, '.')) {
                $s .= '.0';
            }
            return strlen($native) <= strlen($s) ? $native : $s;
        }
        if (is_string($v)) {
            $escaped = str_replace(['\\', "'"], ['\\\\', "\\'"], $v);
            return "'$escaped'";
        }
        if (is_array($v)) {
            if (empty($v)) {
                return '[]';
            }
            $isAssoc = !array_is_list($v);
            $lines   = [];
            foreach ($v as $k => $val) {
                $serialized = $this->phpVal($val, $depth + 1);
                $lines[] = $isAssoc
                    ? $ipad . $this->phpVal($k, $depth + 1) . ' => ' . $serialized
                    : $ipad . $serialized;
            }
            return "[\n" . implode(",\n", $lines) . ",\n{$pad}]";
        }
        return var_export($v, true);
    }
}
