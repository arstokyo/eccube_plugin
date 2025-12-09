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

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Eccube\Repository\MemberRepository;
use Plugin\AceClient43\Bridge\ProductBridge;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Service\ProductImportHelper;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductImportV2Command extends AbstractProductImportCommand
{
    protected static $defaultName = 'eccube:aceclient:import-product-v2';

    protected ProductBridge $productBridge;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        MemberRepository $memberRepository,
        EntityManagerInterface $entityManager,
        ProductImportHelper $productImportHelper,
        ManagerRegistry $managerRegistry,
        LoggerInterface $consoleLogger,
        ProductBridge $productBridge,
    ) {
        parent::__construct($eventDispatcher, $memberRepository, $entityManager, $productImportHelper, $managerRegistry, $consoleLogger);
        $this->productBridge = $productBridge;
    }

    protected function configure()
    {
        parent::configure();
        $this
            ->setHelp('このコマンドは通販Aceから商品をインポートします。【推奨】バッチインポート方式を使用します。')
            ->setDescription('[推奨] 通販Aceから商品をインポートするコマンド（V2・バッチ処理）');
    }

    protected function getImportCommandName(): string
    {
        return 'eccube:aceclient:import-product-v2';
    }

    /**
     * @throws \Throwable
     * @throws DataTypeMissMatchException
     */
    protected function executeImport($creator, \DateTime $updateFrom, \DateTime $updateTo, array $options, LoggerInterface $logger): int
    {
        // with productImportV2
        // we use batch instead of upsert each one row like V1 when use productImportHelper->import
        return $this->productImportHelper->batchImport(
            $creator,
            $updateFrom,
            $options,
            $logger,
            $updateTo,
        );
    }
}
