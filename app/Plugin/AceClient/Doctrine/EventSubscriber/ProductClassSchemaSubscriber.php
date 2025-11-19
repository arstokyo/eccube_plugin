<?php

namespace Plugin\AceClient43\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Doctrine\ORM\Tools\ToolEvents;

/**
 * Add unique index to ProductClass entity for ace_product_id
 */
class ProductClassSchemaSubscriber implements EventSubscriber
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

        if ($schema->hasTable('dtb_product_class')) {
            $table = $schema->getTable('dtb_product_class');

            // Check if the unique index doesn't already exist
            if (!$table->hasIndex('ace_product_id_idx')) {
                $table->addUniqueIndex(['ace_product_id'], 'ace_product_id_idx');
            }
        }
    }
}
