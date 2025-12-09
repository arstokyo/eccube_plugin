<?php

namespace Plugin\AceClient43\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Doctrine\ORM\Tools\ToolEvents;

/**
 * Add unique constraint to Payment entity
 */
class PaymentSchemaSubscriber implements EventSubscriber
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

        if ($schema->hasTable('dtb_payment')) {
            $table = $schema->getTable('dtb_payment');

            // Check if the unique constraint doesn't already exist
            if (!$table->hasIndex('ace_payment_id_idx') && $table->hasColumn('ace_payment_id')) {
                $table->addUniqueIndex(['ace_payment_id'], 'ace_payment_id_idx');
            }
        }
    }
}
