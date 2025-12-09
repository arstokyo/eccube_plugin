<?php

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

namespace Plugin\AceClient43\Command;

use Psr\Log\LoggerInterface;

class ProductImportCommand extends AbstractProductImportCommand
{
    protected static $defaultName = 'eccube:aceclient:import-product';

    protected function configure()
    {
        parent::configure();
        $this
            ->setHelp('このコマンドは通販Aceから商品をインポートします。【非推奨】V2の使用を推奨します。')
            ->setDescription('[非推奨] 通販Aceから商品をインポートするコマンド（V2を推奨）');
    }

    protected function executeImport($creator, \DateTime $updateFrom, \DateTime $updateTo, array $options, LoggerInterface $logger): int
    {
        try {
            return $this->productImportHelper->import($creator, $updateFrom, $updateTo, $options, $logger);
        } catch (\Throwable $e) {
            $logger->error(sprintf('<error>商品インポート中にエラーが発生しました: %s</error>', $e->getMessage()));
            throw $e;
        }
    }
}
