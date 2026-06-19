<?php
/**
 * Fetch native-language rdfs:label values from Wikidata and inject them as
 * additional dcterms:title values with @language tags.
 *
 * Usage:
 *   php dev/build-labels.php <dataset>           # fetch and inject
 *   php dev/build-labels.php <dataset> --dry-run # report only, no writes
 *
 * Uses P103 (native language) from Wikidata as the primary signal, with P1412
 * (languages spoken/written) as a fallback for people whose P103 is unset or
 * resolves only to Latin (a scholarly lingua franca, not a native language).
 * English and Latin are skipped. Labels identical to the existing title are also
 * skipped — they would add a language tag but no visible content.
 *
 * Items whose dcterms:title is already an array containing a language-tagged
 * value are skipped — re-running is safe.
 */
$args = array_slice($argv, 1);
$positional = array_values(array_filter($args, fn ($a) => !str_starts_with($a, '-')));

if (!$positional) {
    fwrite(STDERR, "Usage: php dev/build-labels.php <dataset> [--dry-run]\n");
    exit(1);
}

(new LabelBuilder($positional[0], in_array('--dry-run', $args)))->run();

class LabelBuilder
{
    private const SPARQL_DELAY = 2.0;

    // Items to exclude from label injection — Wikidata P103/P1412 data is misleading for these.
    private const SKIP_IDS = [
        'suleiman-the-magnificent', // Ottoman Turkish native; Wikidata resolves Arabic via P1412
        'rosalind-franklin',        // English native; Wikidata P103 French adds only her middle name
    ];

    // Manual language overrides — figures where Wikidata P103/P1412 is absent or incorrect.
    // Phase 2 fetches the rdfs:label in this language automatically.
    private const MANUAL_LANGS = [
        'cleopatra-vii'       => 'el', // Koine Greek — P103/P1412 not set on Wikidata
        'himiko'              => 'ja', // Japanese
        'zhang-heng'          => 'zh', // Chinese
        'theodora'            => 'el', // Byzantine Greek
        'omar-khayyam'        => 'fa', // Persian
        'ibn-sina'            => 'ar', // Arabic/Persian
        'razia-sultana'       => 'ur', // Urdu (Perso-Arabic script)
        'tamar-of-georgia'    => 'ka', // Georgian
        'srinivasa-ramanujan' => 'ta', // Tamil
        // nagarjuna => 'sa' moved to MANUAL_LABELS — Wikidata sa label has disambiguation suffix
        'mansa-musa'          => 'ar', // Arabic historical record
        'nikola-tesla'        => 'sr', // Serbian Cyrillic (Wikidata P1412 resolved 'sh' Latin instead)
    ];

    // Hardcoded labels for figures whose native-language name is not on Wikidata,
    // or where the Wikidata label has disambiguation suffixes that must be stripped.
    private const MANUAL_LABELS = [
        'shaka'     => ['zu', 'uShaka kaSenzangakhona'], // Zulu — no Wikidata label exists
        'nagarjuna' => ['sa', 'नागार्जुन'],              // Sanskrit — Wikidata label has disambiguation suffix
    ];

    // Priority order for P1412 tiebreaking when a person has multiple non-English languages.
    // Non-Latin scripts are preferred first (more visually distinct as a demo), then Latin-script languages.
    private const PRIORITY_LANGS = ['zh', 'ja', 'ko', 'ar', 'fa', 'he', 'hi', 'sa', 'bn', 'ur', 'ta', 'el', 'ru', 'uk', 'ka', 'am', 'th'];

    // Wikidata QIDs for classical/ancient languages that lack a P218 ISO 639-1 code,
    // mapped to the modern language code for the same script.
    private const CLASSICAL_LANG_MAP = [
        'Q37041'   => 'zh',  // Classical Chinese
        'Q10913056' => 'zh', // Old Chinese (Archaic Chinese — Confucius era)
        'Q35137'   => 'zh',  // Literary Chinese (wenyan)
        'Q35497'   => 'el',  // Ancient Greek
        'Q36510'   => 'el',  // Koine Greek
        'Q29572'   => 'ar',  // Classical Arabic
    ];

    private string  $dataset;
    private string  $dataFile;
    private bool    $dryRun;
    private string  $userAgent;
    private ?string $oauthToken     = null;
    private float   $lastSparqlTime = 0.0;
    private bool    $rateLimited    = false;

    public function __construct(string $dataset, bool $dryRun)
    {
        $this->dataset  = $dataset;
        $root = dirname(__DIR__);
        $this->dataFile = "$root/datasets/$dataset/$dataset.php";
        $this->dryRun   = $dryRun;

        $configFile = __DIR__ . '/config.php';
        $config = file_exists($configFile) ? require $configFile : [];
        $this->userAgent  = $config['wikidata_user_agent']
            ?? 'omeka-s/DemoData-module build-labels/1.0 (https://omeka.org)';
        $this->oauthToken = $config['wikidata_access_token'] ?? null;
    }

    public function run(): void
    {
        if (!file_exists($this->dataFile)) {
            fwrite(STDERR, "Dataset not found: {$this->dataFile}\n");
            exit(1);
        }

        $data    = require $this->dataFile;
        $items   = $data['items'] ?? [];
        $pending = array_values(array_filter($items, fn ($i) => $this->isPending($i)));

        $total = count($items);
        $done  = $total - count($pending);
        echo "Dataset: {$this->dataset} | Items: $total | Already done: $done | Pending: " . count($pending) . "\n";

        if (!$pending) {
            echo "Nothing to do.\n";
            return;
        }

        $labelMap = $this->fetchLabels($pending);

        if (!$labelMap) {
            echo "Nothing to inject.\n";
            return;
        }

        if ($this->dryRun) {
            echo "\n(dry run — found labels for " . count($labelMap) . " item(s))\n";
            $titleIndex = array_column($items, 'dcterms:title', 'id');
            foreach ($labelMap as $id => $entry) {
                $title = is_string($titleIndex[$id] ?? null) ? $titleIndex[$id] : '';
                [$lang, $value] = $entry;
                echo "  $id" . ($title !== '' ? " ($title)" : '') . ": [$lang] $value\n";
            }
            return;
        }

        foreach ($data['items'] as &$item) {
            $id = $item['id'] ?? null;
            if (!$id || !isset($labelMap[$id])) {
                continue;
            }
            [$lang, $value] = $labelMap[$id];
            $existing = $item['dcterms:title'];
            $item['dcterms:title'] = is_array($existing)
                ? [...$existing, ['@value' => $value, '@language' => $lang]]
                : [$existing, ['@value' => $value, '@language' => $lang]];
        }
        unset($item);

        file_put_contents($this->dataFile, "<?php\nreturn " . $this->phpVal($data, 0) . ";\n");
        echo "\nUpdated: {$this->dataFile}\n";
        echo "Injected labels for: " . count($labelMap) . " item(s)\n";
    }

    /**
     * Two-phase fetch:
     *  1. Query P103 (native language) + P218 (ISO code) for each person.
     *     Fall back to CLASSICAL_LANG_MAP for ancient languages lacking P218.
     *  2. Query rdfs:label in the resolved native language for each matched person.
     *
     * @return array<string, array{string, string}>  item_id => [lang_code, label]
     */
    private function fetchLabels(array $pending): array
    {
        $qidToId = [];
        foreach ($pending as $item) {
            $qid = $this->extractQid($item);
            if ($qid) {
                $qidToId[$qid] = $item['id'];
            }
        }

        if (!$qidToId) {
            echo "No QIDs found.\n";
            return [];
        }

        // Phase 1: resolve native language per person
        echo "Phase 1: querying native languages (P103) for " . count($qidToId) . " people...\n";
        $idToLang = $this->fetchNativeLangs($qidToId);
        echo "  Native non-Latin language resolved for: " . count($idToLang) . " | No non-Latin native language: " . (count($qidToId) - count($idToLang)) . "\n";

        if (!$idToLang || $this->rateLimited) {
            return [];
        }

        // Phase 2: fetch one label per person in their native language
        echo "Phase 2: fetching labels in native language...\n";

        $idToQid = array_flip($qidToId);
        $valueLines = [];
        foreach ($idToLang as $id => $lang) {
            $qid = $idToQid[$id] ?? null;
            if ($qid) {
                $valueLines[] = "(wd:$qid \"$lang\")";
            }
        }

        $titleMap = [];
        foreach ($pending as $item) {
            $id    = $item['id'] ?? null;
            $title = $item['dcterms:title'] ?? null;
            if ($id && is_string($title)) {
                $titleMap[$id] = $title;
            }
        }

        $labelMap = [];
        foreach (array_chunk($valueLines, 200) as $batch) {
            if ($this->rateLimited) {
                break;
            }
            $values = implode(' ', $batch);
            $query  = "SELECT ?item ?label WHERE {\n"
                    . "  VALUES (?item ?lang) { $values }\n"
                    . "  ?item rdfs:label ?label .\n"
                    . "  FILTER(lang(?label) = ?lang)\n"
                    . "}";

            $rows = $this->sparql($query);
            echo "  SPARQL returned " . count($rows) . " rows\n";

            foreach ($rows as $row) {
                $uri   = $row['item']['value'] ?? null;
                $label = $row['label']['value'] ?? null;
                $lang  = $row['label']['xml:lang'] ?? null;
                if (!$uri || !$label || !$lang) {
                    continue;
                }
                $qid = basename($uri);
                $id  = $qidToId[$qid] ?? null;
                if (!$id || isset($labelMap[$id])) {
                    continue;
                }
                // Skip labels identical to the existing English title — they add a tag but no visible content.
                if (isset($titleMap[$id]) && $label === $titleMap[$id]) {
                    continue;
                }
                $labelMap[$id] = [$lang, $label];
            }
        }

        // Inject labels not available on Wikidata.
        $pendingIds = array_flip(array_column($pending, 'id'));
        foreach (self::MANUAL_LABELS as $id => [$lang, $label]) {
            if (!isset($pendingIds[$id]) || isset($labelMap[$id])) {
                continue;
            }
            if (isset($titleMap[$id]) && $label === $titleMap[$id]) {
                continue;
            }
            $labelMap[$id] = [$lang, $label];
        }

        $found   = count($labelMap);
        $missing = count($idToLang) - $found;
        echo "Labels found: $found";
        if ($missing > 0) {
            echo " | No label in native language: $missing";
            foreach ($idToLang as $id => $lang) {
                if (!isset($labelMap[$id])) {
                    echo "\n  No $lang label: $id";
                }
            }
        }
        echo "\n";

        return $labelMap;
    }

    /**
     * Resolve native language per person using two passes:
     *   1. P103 (native language) — highest confidence.
     *   2. P1412 (languages spoken/written) — fallback for people without P103.
     *      When multiple P1412 languages are available, pick by TARGET_LANGS priority.
     *
     * @param  array<string, string> $qidToId  QID => item_id
     * @return array<string, string>            item_id => lang_code
     */
    private function fetchNativeLangs(array $qidToId): array
    {
        [$idToLang, $hasP103] = $this->fetchLangsByProperty($qidToId, 'P103', false);
        echo "  P103: resolved " . count($idToLang) . " / " . count($qidToId) . "\n";

        // Only fall back to P1412 for people with no P103 at all.
        // If P103 is set but Latin-script (e.g. Leibniz → German), the person is
        // a confirmed Latin-script native speaker and P1412 should not override that.
        $noP103 = array_filter($qidToId, fn ($id) => !isset($hasP103[$id]));
        if ($noP103 && !$this->rateLimited) {
            [$p1412] = $this->fetchLangsByProperty($noP103, 'P1412', true);
            echo "  P1412: resolved " . count($p1412) . " / " . count($noP103) . "\n";
            $idToLang += $p1412;
        }

        // Apply manual overrides for figures where Wikidata P103/P1412 is absent or incorrect.
        $pendingIds = array_flip(array_values($qidToId));
        $applied = 0;
        foreach (self::MANUAL_LANGS as $id => $lang) {
            if (isset($pendingIds[$id])) {
                $idToLang[$id] = $lang;
                $applied++;
            }
        }
        if ($applied) {
            echo "  Manual: $applied override(s) applied\n";
        }

        return $idToLang;
    }

    /**
     * Query a language property (P103 or P1412) for the given QIDs and resolve
     * each to a TARGET_LANGS language code via P218 or CLASSICAL_LANG_MAP.
     *
     * @param  bool $usePriority  When true (P1412), collect all languages per item
     *                            and pick the best by TARGET_LANGS priority order.
     *                            When false (P103), take the first match only.
     * @return array{array<string, string>, array<string, true>}
     *         [item_id => lang_code, item_id => true (had any result)]
     */
    private function fetchLangsByProperty(array $qidToId, string $property, bool $usePriority): array
    {
        $values    = implode(' ', array_map(fn ($q) => "(wd:$q)", array_keys($qidToId)));
        $query     = "SELECT ?item ?lang ?langCode WHERE {\n"
                   . "  VALUES (?item) { $values }\n"
                   . "  ?item wdt:{$property} ?lang .\n"
                   . "  OPTIONAL { ?lang wdt:P218 ?langCode . }\n"
                   . "}";

        $rows = $this->sparql($query);

        // Track every item that had any result for this property (regardless of language).
        $hasResult = []; // id => true
        // Collect resolved language codes per item (English excluded).
        $itemLangs = []; // id => [lang_code, ...]

        foreach ($rows as $row) {
            $uri     = $row['item']['value'] ?? null;
            $langUri = $row['lang']['value'] ?? null;
            $code    = $row['langCode']['value'] ?? null;
            if (!$uri) {
                continue;
            }
            $qid = basename($uri);
            $id  = $qidToId[$qid] ?? null;
            if (!$id) {
                continue;
            }

            $resolved = null;
            if ($code && !in_array($code, ['en', 'la'])) {
                $resolved = $code;
            } elseif ($langUri) {
                $resolved = self::CLASSICAL_LANG_MAP[basename($langUri)] ?? null;
            }

            if ($resolved) {
                // Only mark as having a result when we actually resolved a usable language.
                // This lets Latin-only P103 entries fall through to the P1412 fallback.
                $hasResult[$id] = true;
                $itemLangs[$id][] = $resolved;
            }
        }

        // For each item, pick one language code.
        $idToLang = [];
        foreach ($itemLangs as $id => $langs) {
            if (!$usePriority) {
                // P103: take first resolved code (Wikidata ordering).
                $idToLang[$id] = $langs[0];
            } else {
                // P1412: prefer non-Latin scripts by PRIORITY_LANGS order, then take first.
                $picked = null;
                foreach (self::PRIORITY_LANGS as $candidate) {
                    if (in_array($candidate, $langs)) {
                        $picked = $candidate;
                        break;
                    }
                }
                $idToLang[$id] = $picked ?? $langs[0];
            }
        }

        return [$idToLang, $hasResult];
    }

    private function isPending(array $item): bool
    {
        if (empty($item['dcterms:identifier'])) {
            return false;
        }
        if (in_array($item['id'] ?? null, self::SKIP_IDS)) {
            return false;
        }
        $title = $item['dcterms:title'] ?? null;
        if ($title === null) {
            return false;
        }
        if (is_array($title)) {
            foreach ($title as $v) {
                if (is_array($v) && isset($v['@language'])) {
                    return false;
                }
            }
        }
        return true;
    }

    private function extractQid(array $item): ?string
    {
        $identifier = $item['dcterms:identifier'] ?? null;
        if (!$identifier) {
            return null;
        }
        $uri = is_array($identifier) ? ($identifier['@value'] ?? null) : $identifier;
        if (!$uri) {
            return null;
        }
        $qid = basename((string) $uri);
        return str_starts_with($qid, 'Q') ? $qid : null;
    }

    private function sparql(string $query): array
    {
        $this->throttle($this->lastSparqlTime, self::SPARQL_DELAY);

        $retryAfter = null;
        $headers    = ['Accept: application/sparql-results+json'];
        if ($this->oauthToken) {
            $headers[] = 'Authorization: Bearer ' . $this->oauthToken;
        }
        $ch = curl_init('https://query.wikidata.org/sparql');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query(['query' => $query]),
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_USERAGENT      => $this->userAgent,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HEADERFUNCTION => $this->retryAfterClosure($retryAfter),
        ]);
        $body   = curl_exec($ch);
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
