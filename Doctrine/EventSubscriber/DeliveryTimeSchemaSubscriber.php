<?php

namespace Plugin\AceClient43\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Doctrine\ORM\Tools\ToolEvents;

/**
 * Add unique constraint to Delivery Time entity
 */
class DeliveryTimeSchemaSubscriber implements EventSubscriber
{
    /**
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [
            ToolEvents::postGenerateSchema,
        ];
    }

    /**
     * @param GenerateSchemaEventArgs $args
     * @throws SchemaException
     */
    public function postGenerateSchema(GenerateSchemaEventArgs $args): void
    {
        $schema = $args->getSchema();

        if ($schema->hasTable('dtb_delivery_time')) {
            $table = $schema->getTable('dtb_delivery_time');

            // Check if the unique constraint doesn't already exist
            if (!$table->hasIndex('ace_delivery_time_idx')) {
                $table->addUniqueIndex(['delivery_id', 'ace_delivery_time_id'], 'ace_delivery_time_idx');
            }
        }
    }
}
