<?php

namespace Plugin\AceClient43\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\EntityManagerInterface;
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
     *
     * @throws SchemaException
     */
    public function postGenerateSchema(GenerateSchemaEventArgs $args): void
    {
        $schema = $args->getSchema();

        if ($schema->hasTable('dtb_product_class')) {
            $table = $schema->getTable('dtb_product_class');

            // Check if the unique index doesn't already exist
            if (!$table->hasIndex('ace_product_id_idx') && $table->hasColumn('ace_product_id')) {
                try {
                    $args->getEntityManager()->wrapInTransaction(function (EntityManagerInterface $em) {
                        $em->getConnection()->executeStatement(
                            "UPDATE dtb_product_class SET ace_product_id = COALESCE(product_code, id) WHERE ace_product_id IS NULL OR ace_product_id = ''"
                        );
                    });
                } catch (\Throwable $e) {
                    log_error('通販Aceの商品IDの更新に失敗しました: '.$e->getMessage());
                    // ignore
                }

                $table->addUniqueIndex(['ace_product_id'], 'ace_product_id_idx');
            }
        }
    }
}
