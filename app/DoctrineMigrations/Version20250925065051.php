<?php

declare(strict_types=1);

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250925065051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '通販Aceの初期レコードを追加';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO `dtb_plugin` VALUES (1,\'AceClient Plugin 43\',\'AceClient43\',1,\'1.0.1\',\'2940\',0,\'2025-09-25 07:55:01\',\'2025-09-25 07:55:01\',\'plugin\')');

        $this->addSql('ALTER TABLE dtb_cart ADD enable_ace_order_support TINYINT(1) DEFAULT 0 NOT NULL COMMENT \'Aceの受注サポート機能を有効にするかどうか\', ADD ace_transaction_type INT NOT NULL COMMENT \'ACE取引区分 - Transaction type with customer (one-time/credit)\', ADD ace_payment_id INT NOT NULL COMMENT \'ACE決済ID\', ADD ace_delivery_fee NUMERIC(12, 2) DEFAULT \'0\' NOT NULL, ADD ace_discount_amount NUMERIC(12, 2) DEFAULT \'0\' NOT NULL, ADD ace_charge_fee NUMERIC(12, 2) DEFAULT \'0\' NOT NULL, ADD ace_earnable_point NUMERIC(12, 2) DEFAULT \'0\' NOT NULL COMMENT \'ACEから返却された付与予定ポイント\', CHANGE total_price total_price NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE delivery_fee_total delivery_fee_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_cart_item ADD dirty TINYINT(1) DEFAULT 1 NOT NULL, ADD ace_markup_rate DOUBLE PRECISION NOT NULL COMMENT \'Ace掛け税率\', CHANGE price price NUMERIC(12, 2) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_customer ADD ace_customer_id VARCHAR(255) DEFAULT NULL COMMENT \'ACE顧客ID\', CHANGE buy_total buy_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8298BBE3798BE931 ON dtb_customer (ace_customer_id)');
        $this->addSql('ALTER TABLE dtb_customer_address ADD ace_eda_no INT DEFAULT NULL COMMENT \'Ace住所枝番号\'');
        $this->addSql('ALTER TABLE dtb_delivery ADD ace_delivery_id INT UNSIGNED DEFAULT NULL COMMENT \'ACE配送業者ID(HSID)\'');
        $this->addSql('ALTER TABLE dtb_delivery_time ADD ace_delivery_time_id INT UNSIGNED DEFAULT NULL COMMENT \'ACE配送時間帯ID(HTID)\'');
        $this->addSql('ALTER TABLE dtb_order ADD ace_transaction_type INT NOT NULL COMMENT \'ACE取引区分 - Transaction type with customer (one-time/credit)\', ADD ace_payment_id INT NOT NULL COMMENT \'ACE決済ID\', ADD ace_delivery_fee NUMERIC(12, 2) DEFAULT \'0\' NOT NULL, ADD ace_discount_amount NUMERIC(12, 2) DEFAULT \'0\' NOT NULL, ADD ace_charge_fee NUMERIC(12, 2) DEFAULT \'0\' NOT NULL, ADD ace_earnable_point NUMERIC(12, 2) DEFAULT \'0\' NOT NULL COMMENT \'ACEから返却された付与予定ポイント\', CHANGE subtotal subtotal NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE discount discount NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE delivery_fee_total delivery_fee_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE charge charge NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE tax tax NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE total total NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE payment_total payment_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_order_item ADD ace_ignore_stock INT DEFAULT 1 NOT NULL COMMENT \'通販Aceの在庫を無視するフラグ\', ADD ace_markup_rate DOUBLE PRECISION NOT NULL COMMENT \'Ace掛け税率\', CHANGE price price NUMERIC(12, 2) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_payment ADD ace_payment_id INT UNSIGNED DEFAULT NULL, CHANGE charge charge NUMERIC(12, 2) UNSIGNED DEFAULT \'0\'');

        // Add ace_product_id as nullable first
        $this->addSql('ALTER TABLE dtb_product_class ADD ace_product_id VARCHAR(20) DEFAULT NULL COMMENT \'Ace商品ID\', ADD ace_product_type INT DEFAULT 0 NOT NULL COMMENT \'Ace商品種別\', ADD ace_tax_type INT DEFAULT NULL COMMENT \'Ace税区分\'');

        // Update existing data with ace_product_id = id
        $this->addSql('UPDATE dtb_product_class SET ace_product_id = id WHERE ace_product_id IS NULL');

        // Change ace_product_id to NOT NULL and create unique index
        $this->addSql('ALTER TABLE dtb_product_class MODIFY ace_product_id VARCHAR(20) NOT NULL COMMENT \'Ace商品ID\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1A11D1BA8EE99DDE ON dtb_product_class (ace_product_id)');

        $this->addSql('ALTER TABLE dtb_shipping ADD customer_address_id INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE dtb_shipping ADD CONSTRAINT FK_2EBD22CE87EABF7 FOREIGN KEY (customer_address_id) REFERENCES dtb_customer_address (id)');
        $this->addSql('CREATE INDEX IDX_2EBD22CE87EABF7 ON dtb_shipping (customer_address_id)');

        $this->addSql('CREATE TABLE IF NOT EXISTS plg_ace_client_config (
            `id` int unsigned NOT NULL AUTO_INCREMENT,
            `base_uri` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT \'https://155.248.172.151:20443/dev\',
            `is_log_on` tinyint(1) NOT NULL DEFAULT \'0\',
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin');
        $this->addSql('INSERT IGNORE INTO plg_ace_client_config (id, base_uri, is_log_on) VALUES (1, \'https://155.248.172.151:20443/dev\', 0)');
        $this->addSql('ALTER TABLE plg_ace_client_config ADD syid INT DEFAULT 1 NOT NULL, ADD order_route_id INT DEFAULT NULL, ADD use_ace_delivery TINYINT(1) DEFAULT 1 NOT NULL, ADD use_ace_discount TINYINT(1) DEFAULT 0 NOT NULL, ADD use_ace_charge TINYINT(1) DEFAULT 0 NOT NULL, ADD validate_duplicate_entry TINYINT(1) DEFAULT 1 NOT NULL, ADD validate_duplicate_admin_entry TINYINT(1) DEFAULT 1 NOT NULL, ADD redirect_forgot TINYINT(1) DEFAULT 0 NOT NULL, ADD forgot_path VARCHAR(255) DEFAULT \'\' NOT NULL, ADD default_payment_id INT DEFAULT 0 NOT NULL, ADD default_transaction_type INT DEFAULT 0 NOT NULL, ADD enable_order_support TINYINT(1) DEFAULT 0 NOT NULL, ADD add_cart_index TINYINT(1) DEFAULT 1 NOT NULL, ADD add_cart_shopping TINYINT(1) DEFAULT 0 NOT NULL, ADD sync_customer_routes JSON DEFAULT NULL COMMENT \'顧客同期対象ルート\', ADD add_point_from_ace TINYINT(1) DEFAULT 0 NOT NULL');
        $this->addSql('UPDATE plg_ace_client_config SET syid = 10 WHERE id = 1');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dtb_cart DROP enable_ace_order_support, DROP ace_transaction_type, DROP ace_payment_id, DROP ace_delivery_fee, DROP ace_discount_amount, DROP ace_charge_fee, DROP ace_earnable_point, CHANGE total_price total_price NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE delivery_fee_total delivery_fee_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_cart_item DROP dirty, DROP ace_markup_rate, CHANGE price price NUMERIC(12, 2) DEFAULT \'0.00\' NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8298BBE3798BE931 ON dtb_customer');
        $this->addSql('ALTER TABLE dtb_customer DROP ace_customer_id, CHANGE buy_total buy_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\'');
        $this->addSql('ALTER TABLE dtb_customer_address DROP ace_eda_no');
        $this->addSql('ALTER TABLE dtb_delivery DROP ace_delivery_id');
        $this->addSql('ALTER TABLE dtb_delivery_time DROP ace_delivery_time_id');
        $this->addSql('ALTER TABLE dtb_order DROP ace_transaction_type, DROP ace_payment_id, DROP ace_delivery_fee, DROP ace_discount_amount, DROP ace_charge_fee, DROP ace_earnable_point, CHANGE subtotal subtotal NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE discount discount NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE delivery_fee_total delivery_fee_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE charge charge NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE tax tax NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE total total NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL, CHANGE payment_total payment_total NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_order_item DROP ace_ignore_stock, DROP ace_markup_rate, CHANGE price price NUMERIC(12, 2) DEFAULT \'0.00\' NOT NULL');
        $this->addSql('ALTER TABLE dtb_payment DROP ace_payment_id, CHANGE charge charge NUMERIC(12, 2) UNSIGNED DEFAULT \'0.00\'');
        $this->addSql('DROP INDEX UNIQ_1A11D1BA8EE99DDE ON dtb_product_class');
        $this->addSql('ALTER TABLE dtb_product_class DROP ace_product_id, DROP ace_product_type, DROP ace_tax_type');
        $this->addSql('ALTER TABLE dtb_shipping DROP FOREIGN KEY FK_2EBD22CE87EABF7');
        $this->addSql('DROP INDEX IDX_2EBD22CE87EABF7 ON dtb_shipping');
        $this->addSql('ALTER TABLE dtb_shipping DROP customer_address_id');
        $this->addSql('ALTER TABLE plg_ace_client_config DROP syid, DROP order_route_id, DROP use_ace_delivery, DROP use_ace_discount, DROP use_ace_charge, DROP validate_duplicate_entry, DROP validate_duplicate_admin_entry, DROP redirect_forgot, DROP forgot_path, DROP default_payment_id, DROP default_transaction_type, DROP enable_order_support, DROP add_cart_index, DROP add_cart_shopping, DROP sync_customer_routes, DROP add_point_from_ace');
    }
}
