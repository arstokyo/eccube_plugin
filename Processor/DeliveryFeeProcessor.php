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

namespace Plugin\AceClient43\Processor;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\TaxDisplayType;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\ItemHolderPreprocessor;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\OrderTrait;
use Plugin\AceClient43\Service\AceConfigService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * 受注サポートから振られている送料をOrderItemに変換するPreprocessor.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DeliveryFeeProcessor implements ItemHolderPreprocessor
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    /**
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $eventDispatcher;

    protected AceConfigService $configService;

    /**
     * Injected master IDs (from parameters)
     */
    private int $taxDisplayTypeId;

    private int $taxTypeId;

    public function __construct(
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher,
        AceConfigService $configService,
        int $taxDisplayTypeId,
        int $taxTypeId,
    ) {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->configService = $configService;
        $this->taxDisplayTypeId = $taxDisplayTypeId;
        $this->taxTypeId = $taxTypeId;
    }

    /**
     * @param ItemHolderInterface|Order $itemHolder
     * @param PurchaseContext $context
     *
     * @throws \Doctrine\ORM\NoResultException
     */
    public function process(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        $config = $this->configService->getConfig();

        $this->removeDeliveryFeeItems($itemHolder, $config);
        $this->addDeliveryFeeItems($itemHolder, $config);
    }

    private function removeDeliveryFeeItems(Order $Order, Config $config): void
    {
        foreach ($Order->getShippings() as $Shipping) {
            foreach ($Shipping->getOrderItems() as $item) {
                if ($item->getProcessorName() == DeliveryFeeProcessor::class) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                } elseif ($config->shouldUseAceDelivery() && $item->isDeliveryFee()) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                }
            }
        }
    }

    /**
     * @param Order|OrderTrait $Order
     */
    private function addDeliveryFeeItems(Order $Order, Config $config): void
    {
        if (!$config->shouldUseAceDelivery() || 0 >= $fee = $Order->getAceDeliveryFee()) {
            return;
        }

        $DeliveryFeeType = $this->entityManager->find(OrderItemType::class, OrderItemType::DELIVERY_FEE);
        $TaxDisplay = $this->entityManager->find(TaxDisplayType::class, $this->taxDisplayTypeId);
        $Taxation = $this->entityManager->find(TaxType::class, $this->taxTypeId);

        FeeSeparateHelper::separate(
            $fee,
            $Order,
            $DeliveryFeeType,
            $TaxDisplay,
            $Taxation,
            DeliveryFeeProcessor::class
        );
    }
}
