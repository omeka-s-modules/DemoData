<?php
namespace DemoData\Job;

/**
 * Purge a previously imported demo dataset, removing all items, item sets, and the resource template.
 */
class Purge extends AbstractDemoDataJob
{
    public function perform(): void
    {
        $settings = $this->get('Omeka\Settings');
        $logger = $this->get('Omeka\Logger');

        $dataset = $this->getArg('dataset');
        $tracking = $settings->get("demo_data_imported_{$dataset}");

        if (!$tracking) {
            $logger->info('Nothing to purge — dataset not recorded as imported.');
            return;
        }

        $logger->info(sprintf('Purging %d items, %d item sets%s.',
            count($tracking['items'] ?? []),
            count($tracking['item_sets'] ?? []),
            $tracking['resource_template'] ? ', and resource template' : ''
        ));

        $this->purgeDataset($tracking);
        $settings->delete("demo_data_imported_{$dataset}");
        $this->clearPendingJob($dataset);
        $logger->info('Purge complete.');
    }
}
