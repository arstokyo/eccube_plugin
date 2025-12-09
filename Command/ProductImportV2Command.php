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

use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Psr\Log\LoggerInterface;

class ProductImportV2Command extends AbstractProductImportCommand
{
    protected static $defaultName = 'eccube:aceclient:import-product-v2';

    protected function configure()
    {
        parent::configure();
        $this
            ->setHelp('このコマンドは通販Aceから商品をインポートします。【推奨】バッチインポート方式を使用します。')
            ->setDescription('[推奨] 通販Aceから商品をインポートするコマンド（V2・バッチ処理）');
    }

    /**
     * @throws \Throwable
     * @throws DataTypeMissMatchException
     */
    protected function executeImport($creator, \DateTime $updateFrom, \DateTime $updateTo, array $options, LoggerInterface $logger): int
    {
        return $this->productImportHelper->batchImport(
            $creator,
            $updateFrom,
            $options,
            $logger,
            $updateTo,
        );
    }
}
