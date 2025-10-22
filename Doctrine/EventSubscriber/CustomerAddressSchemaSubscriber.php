<?php

namespace Plugin\AceClient43\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Doctrine\ORM\Tools\ToolEvents;

/**
 * Add unique constraint to CustomerAddress entity
 */
class CustomerAddressSchemaSubscriber implements EventSubscriber
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

        if ($schema->hasTable('dtb_customer_address')) {
            $table = $schema->getTable('dtb_customer_address');

            // Check if the unique constraint doesn't already exist
            if (!$table->hasIndex('address_eda_idx')) {
                $table->addUniqueIndex(['customer_id', 'ace_eda_no'], 'address_eda_idx');
            }
        }
    }
}
