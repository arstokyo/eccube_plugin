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
 * ace systemのURLを修正し、log_onを1に更新するマイグレーション
 */
final class Version20250925084702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ace systemのURLを/dev/で終わるように修正し、log_onを1に設定します。';
    }

    public function up(Schema $schema): void
    {
        // ace_systemテーブルのURLとlog_onを更新
        $this->addSql("UPDATE plg_ace_client_config SET url = 'https://155.248.172.151:20443/dev/', log_on = 1 WHERE url = 'https://155.248.172.151:20443/dev'");
    }

    public function down(Schema $schema): void
    {
        // 変更を元に戻す
        $this->addSql("UPDATE plg_ace_client_config SET url = 'https://155.248.172.151:20443/dev', log_on = 0 WHERE url = 'https://155.248.172.151:20443/dev/'");
    }
}
