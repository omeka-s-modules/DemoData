<?php
namespace SampleData\Job;

use Omeka\Module\Manager as ModuleManager;
use Throwable;

class Import extends AbstractSampleDataJob
{
    private const MOD_NUMERIC = 'NumericDataTypes';
    private const MOD_MAPPING = 'Mapping';
    private const RELATION_TERM = 'dcterms:relation';

    private string $dataset;
    private ?string $mediaBaseUrl;
    private bool $hasNumeric;
    private bool $hasMapping;
    private array $items;
    private array $classIdMap;
    private array $templatePropIdMap;
    private array $itemSetIds = [];
    private array $createdItemIds = [];
    private ?int $templateId = null;

    public function perform(): void
    {
        $logger = $this->get('Omeka\Logger');
        $settings = $this->get('Omeka\Settings');

        $this->dataset = $this->getArg('dataset');
        $this->mediaBaseUrl = $this->getArg('media_base_url');

        // If already imported, purge first — importing always means a full replace.
        $existing = $settings->get("sample_data_imported_{$this->dataset}");
        if ($existing) {
            $logger->info('Existing import found — purging before re-import.');
            $this->purgeDataset($existing);
            $settings->delete("sample_data_imported_{$this->dataset}");
            if ($this->shouldStop()) {
                $this->clearPendingJob($this->dataset);
                return;
            }
        }

        $dataFile = sprintf('%s/datasets/%s/%s.php', dirname(__DIR__, 2), $this->dataset, $this->dataset);
        $data = require $dataFile;
        $this->items = $data['items'] ?? [];
        $setDefs = $data['item_sets'] ?? [];
        $templateDef = $data['resource_template'] ?? null;

        $this->hasNumeric = $this->isModuleActive(self::MOD_NUMERIC);
        $this->hasMapping = $this->isModuleActive(self::MOD_MAPPING);

        $logger->info(sprintf('Importing %s dataset: %d items, %d item sets.', $this->dataset, count($this->items), count($setDefs)));

        if (!$this->hasNumeric) {
            foreach ($this->items as $item) {
                foreach ($item as $key => $value) {
                    if (!str_contains($key, ':')) {
                        continue;
                    }
                    $vals = is_array($value) && !isset($value['@value']) ? $value : [$value];
                    foreach ($vals as $v) {
                        if (is_array($v) && isset($v['@type']) && str_starts_with($v['@type'], 'numeric:')) {
                            $logger->warn('NumericDataTypes module inactive — numeric values will be imported as plain text.');
                            break 3;
                        }
                    }
                }
            }
        }
        if (!$this->hasMapping) {
            foreach ($this->items as $item) {
                if (!empty($item['map_coordinates'])) {
                    $logger->warn('Mapping module inactive — map coordinates will be skipped.');
                    break;
                }
            }
        }

        if (!$this->mediaBaseUrl) {
            $logger->warn('No media base URL provided — items will be imported without media.');
        }

        // Term ID lookups are read-only — nothing to roll back if they fail, so they run before the try.
        $this->classIdMap = $this->resolveTermIds($this->collectClasses($this->items), 'resource_classes');
        $this->templatePropIdMap = $this->resolveTermIds($this->collectTemplatePropertyTerms($templateDef), 'properties');

        try {
            $this->createItemSets($setDefs);
            if ($templateDef) {
                $this->createResourceTemplate($templateDef);
            }

            // Checkpoint: record sets and template now so a crash during item creation leaves
            // them recoverable — the next import attempt will pre-purge via this entry.
            $settings->set("sample_data_imported_{$this->dataset}", [
                'items' => [],
                'item_sets' => $this->itemSetIds,
                'resource_template' => $this->templateId,
            ]);

            $result = $this->createItems();

            if ($this->shouldStop()) {
                $this->rollbackImport();
                $this->clearPendingJob($this->dataset);
                return;
            }

            $relationsComplete = $this->addRelations($result['slug_to_id']);

            $settings->set("sample_data_imported_{$this->dataset}", [
                'items' => $this->createdItemIds,
                'item_sets' => $this->itemSetIds,
                'resource_template' => $this->templateId,
                'job_id' => $this->job->getId(),
            ]);
            $this->clearPendingJob($this->dataset);

            if (!$relationsComplete) {
                $logger->warn('Job stopped during relation linking. Some inter-item relations may be incomplete. Re-import to resolve.');
            }

            $logger->info(sprintf('Import complete: %d items, %d map markers.', count($this->items), $result['map_count']));

        } catch (Throwable $e) {
            $logger->err(sprintf('Import failed: %s', $e->getMessage()));
            $this->rollbackImport();
            throw $e;
        }
    }

    private function createItems(): array
    {
        $api = $this->get('Omeka\ApiManager');
        $logger = $this->get('Omeka\Logger');

        $slugToId = [];
        $mapCount = 0;
        $total = count($this->items);

        foreach ($this->items as $i => $item) {
            if ($this->shouldStop()) {
                break;
            }
            $payload = $this->buildItemPayload($item);
            $created = $api->create('items', $payload)->getContent();
            $this->createdItemIds[] = $created->id();
            if (isset($item['id'])) {
                $slugToId[$item['id']] = $created->id();
            }
            if ($this->hasMapping && !empty($item['map_coordinates'])) {
                $mapCount++;
            }
            $logger->info(sprintf('[%d/%d] %s', $i + 1, $total,
                $item['dcterms:title'] ?? $item['id'] ?? '(untitled)'));
        }

        return ['slug_to_id' => $slugToId, 'map_count' => $mapCount];
    }

    private function rollbackImport(): void
    {
        $this->purgeDataset([
            'items' => $this->createdItemIds,
            'item_sets' => $this->itemSetIds,
            'resource_template' => $this->templateId,
        ]);
        $this->get('Omeka\Settings')->delete("sample_data_imported_{$this->dataset}");
    }

    private function buildItemPayload(array $item): array
    {
        $payload = ['o:is_public' => true];

        if ($this->templateId) {
            $payload['o:resource_template'] = ['o:id' => $this->templateId];
        }
        if (!empty($item['class']) && isset($this->classIdMap[$item['class']])) {
            $payload['o:resource_class'] = ['o:id' => $this->classIdMap[$item['class']]];
        }
        foreach ($item['sets'] ?? [] as $setKey) {
            if (isset($this->itemSetIds[$setKey])) {
                $payload['o:item_set'][] = ['o:id' => $this->itemSetIds[$setKey]];
            }
        }
        foreach ($item as $key => $value) {
            if (!str_contains($key, ':')) {
                continue;
            }
            $payload[$key] = $this->buildValues($value);
        }
        if ($this->hasMapping && !empty($item['map_coordinates'])) {
            $coords = $item['map_coordinates'];
            $payload['o-module-mapping:feature'] = [[
                'o-module-mapping:geography-type' => $this->detectGeometryType($coords),
                'o-module-mapping:geography-coordinates' => $coords,
            ]];
            if (!empty($item['map_bounds'])) {
                $payload['o-module-mapping:mapping'] = [
                    'o-module-mapping:bounds' => $item['map_bounds'],
                ];
            }
        }
        if (!empty($item['media']) && $this->mediaBaseUrl) {
            $payload['o:media'][] = [
                'o:ingester' => 'url',
                'ingest_url' => sprintf('%s%s/media/%s', $this->mediaBaseUrl, $this->dataset, $item['media']),
            ];
        }
        return $payload;
    }

    private function buildValues(mixed $value, string $type = 'literal'): array
    {
        // 'auto' for property_id lets ValueHydrator resolve the ID from the term key — avoids pre-resolving every property.
        $values = is_array($value) && !isset($value['@value']) ? $value : [$value];
        return array_map(function ($v) use ($type) {
            if (is_array($v) && isset($v['@value'])) {
                $resolvedType = $v['@type'] ?? $type;
                if (str_starts_with($resolvedType, 'numeric:') && !$this->hasNumeric) {
                    $resolvedType = 'literal';
                }
                $entry = $resolvedType === 'uri'
                    ? ['type' => 'uri', 'property_id' => 'auto', '@id' => (string) $v['@value']]
                    : ['type' => $resolvedType, 'property_id' => 'auto', '@value' => (string) $v['@value']];
                if (!empty($v['@annotation'])) {
                    $entry['@annotation'] = $this->buildAnnotation($v['@annotation']);
                }
                return $entry;
            }
            return $type === 'uri'
                ? ['type' => 'uri', 'property_id' => 'auto', '@id' => (string) $v]
                : ['type' => $type, 'property_id' => 'auto', '@value' => (string) $v];
        }, $values);
    }

    private function buildAnnotation(array $annotation): array
    {
        $payload = [];
        foreach ($annotation as $term => $value) {
            $payload[$term] = $this->buildValues($value, 'literal');
        }
        return $payload;
    }

    /** @return string[] e.g. ['sample-data:Person', 'sample-data:Empire'] */
    private function collectClasses(array $items): array
    {
        return array_unique(array_filter(array_column($items, 'class')));
    }

    /** @return string[] e.g. ['dcterms:title', 'dcterms:date'] */
    private function collectTemplatePropertyTerms(?array $templateDef): array
    {
        $terms = [self::RELATION_TERM]; // addRelations needs this even though it's not a dataset property
        foreach ($templateDef['properties'] ?? [] as $prop) {
            $terms[] = $prop['term'];
        }
        return array_unique($terms);
    }

    /**
     * Resolve vocabulary terms to their database IDs.
     *
     * @param string[] $terms     Terms to resolve, e.g. ['dcterms:title', 'dcterms:date']
     * @param string $resource    API resource name: 'properties' or 'resource_classes'
     * @return array<string, int> Map of term to database ID
     */
    private function resolveTermIds(array $terms, string $resource): array
    {
        if (!$terms) {
            return [];
        }

        $api = $this->get('Omeka\ApiManager');
        $termSet = array_flip($terms);
        $prefixes = array_unique(array_map(fn ($t) => explode(':', $t, 2)[0], $terms));

        $idMap = [];
        foreach ($prefixes as $prefix) {
            $page = 1;
            do {
                $results = $api->search($resource, [
                    'vocabulary_prefix' => $prefix,
                    'page' => $page,
                    'per_page' => 100,
                ])->getContent();
                foreach ($results as $obj) {
                    $term = $prefix . ':' . $obj->localName();
                    if (isset($termSet[$term])) {
                        $idMap[$term] = $obj->id();
                    }
                }
                $page++;
            } while (count($results) === 100);
        }

        return $idMap;
    }

    private function createItemSets(array $setDefs): void
    {
        $api = $this->get('Omeka\ApiManager');
        $logger = $this->get('Omeka\Logger');

        foreach ($setDefs as $key => $def) {
            $payload = ['o:is_public' => true];
            foreach ($def as $term => $value) {
                $payload[$term] = $this->buildValues($value, 'literal');
            }
            $created = $api->create('item_sets', $payload)->getContent();
            $this->itemSetIds[$key] = $created->id();
            $logger->info(sprintf('Created item set: %s', $def['dcterms:title'] ?? $key));
        }
    }

    private function createResourceTemplate(array $templateDef): void
    {
        $api = $this->get('Omeka\ApiManager');
        $logger = $this->get('Omeka\Logger');

        $properties = [];
        foreach ($templateDef['properties'] ?? [] as $prop) {
            $term = $prop['term'];
            if (!isset($this->templatePropIdMap[$term])) {
                continue; // Term not found — vocabulary not installed or not yet synced.
            }
            $templateProp = ['o:property' => ['o:id' => $this->templatePropIdMap[$term]]];
            if (!empty($prop['data_type'])) {
                $dataTypes = [];
                foreach ($prop['data_type'] as $dataType) {
                    if (!str_starts_with($dataType, 'numeric:') || $this->hasNumeric) {
                        $dataTypes[] = $dataType;
                    }
                }
                if ($dataTypes) {
                    $templateProp['o:data_type'] = $dataTypes;
                }
            }
            if (!empty($prop['alternate_label'])) {
                $templateProp['o:alternate_label'] = $prop['alternate_label'];
            }
            $properties[] = $templateProp;
        }

        $created = $api->create('resource_templates', [
            'o:label' => $templateDef['label'],
            'o:resource_template_property' => $properties,
        ])->getContent();
        $logger->info(sprintf('Created resource template: %s', $templateDef['label']));
        $this->templateId = $created->id();
    }

    private function addRelations(array $slugToId): bool
    {
        // Relations are set in a second pass because all target items must exist in the DB before they can be linked.
        $api = $this->get('Omeka\ApiManager');
        $logger = $this->get('Omeka\Logger');

        $itemsWithRelations = array_filter($this->items, fn ($item) => !empty($item['relations']) && isset($item['id']));
        if (!$itemsWithRelations) {
            return true;
        }

        $relationPropId = $this->templatePropIdMap[self::RELATION_TERM] ?? null;
        if (!$relationPropId) {
            $logger->warn(sprintf('%s property not found; skipping relation links.', self::RELATION_TERM));
            return true;
        }

        $logger->info(sprintf('Linking relations for %d items.', count($itemsWithRelations)));

        foreach ($itemsWithRelations as $item) {
            if ($this->shouldStop()) {
                return false;
            }
            $itemId = $slugToId[$item['id']] ?? null;
            if (!$itemId) {
                continue;
            }

            $values = [];
            foreach ($item['relations'] as $relatedSlug) {
                $relatedId = $slugToId[$relatedSlug] ?? null;
                if (!$relatedId) {
                    $logger->warn(sprintf("Unresolved relation '%s' on '%s'", $relatedSlug, $item['id']));
                    continue;
                }
                $values[] = [
                    'type' => 'resource',
                    'property_id' => $relationPropId,
                    'value_resource_id' => $relatedId,
                ];
            }
            if ($values) {
                // isPartial=true and append preserve all existing values while adding the relation values.
                $api->update('items', $itemId, [self::RELATION_TERM => $values], [], [
                    'isPartial' => true,
                    'collectionAction' => 'append',
                ]);
            }
        }
        return true;
    }

    private function detectGeometryType(array $coords): string
    {
        if (!is_array($coords[0] ?? null)) {
            return 'point';
        }
        if (!is_array($coords[0][0] ?? null)) {
            return 'linestring';
        }
        return 'polygon';
    }

    private function isModuleActive(string $moduleId): bool
    {
        $module = $this->get('Omeka\ModuleManager')->getModule($moduleId);
        return $module && $module->getState() === ModuleManager::STATE_ACTIVE;
    }
}
