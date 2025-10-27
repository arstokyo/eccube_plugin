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
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Eccube\Repository\Master\OrderItemTypeRepository;
use Eccube\Repository\Master\TaxDisplayTypeRepository;
use Eccube\Repository\Master\TaxTypeRepository;
use Eccube\Service\PurchaseFlow\ItemHolderPreprocessor;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\OrderTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostProcessChargeEvent;
use Plugin\AceClient43\Events\PreProcessChargeEvent;
use Plugin\AceClient43\Service\AceConfigService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * 受注サポートから振られている送料をOrderItemに変換するPreprocessor.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ChargeProcessor implements ItemHolderPreprocessor
{
    protected EntityManagerInterface $entityManager;

    protected EventDispatcherInterface $eventDispatcher;

    protected OrderItemTypeRepository $orderItemTypeRepository;

    protected TaxDisplayTypeRepository $taxDisplayTypeRepository;

    protected TaxTypeRepository $taxTypeRepository;

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
        OrderItemTypeRepository $orderItemTypeRepository,
        TaxDisplayTypeRepository $taxDisplayTypeRepository,
        TaxTypeRepository $taxTypeRepository,
        int $taxDisplayTypeId,
        int $taxTypeId,
    ) {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->orderItemTypeRepository = $orderItemTypeRepository;
        $this->taxDisplayTypeRepository = $taxDisplayTypeRepository;
        $this->taxTypeRepository = $taxTypeRepository;
        $this->configService = $configService;
        $this->taxDisplayTypeId = $taxDisplayTypeId;
        $this->taxTypeId = $taxTypeId;
    }

    /**
     * @param ItemHolderInterface|Order $itemHolder
     * @param PurchaseContext $context
     */
    public function process(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        if (!$itemHolder instanceof Order) {
            return;
        }

        $config = $this->configService->getConfig();
        $event = new PreProcessChargeEvent($itemHolder, $config, $context);
        $this->eventDispatcher->dispatch($event, Events::PRE_PROCESS_CHARGE_EVENT);

        if (!$event->continue) {
            return;
        }

        $this->removeChargeItems($itemHolder, $config);
        $this->addChargeItems($itemHolder, $config);

        $this->eventDispatcher->dispatch(
            new PostProcessChargeEvent($itemHolder, $config, $context),
            Events::POST_PROCESS_CHARGE_EVENT
        );
    }

    private function removeChargeItems(Order $Order, Config $config): void
    {
        foreach ($Order->getShippings() as $Shipping) {
            /** @var OrderItem $item */
            foreach ($Shipping->getOrderItems() as $item) {
                if ($item->getProcessorName() == ChargeProcessor::class) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                } elseif ($config->shouldUseAceCharge() && $item->isCharge()) {
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
    private function addChargeItems(Order $Order, Config $config): void
    {
        if (!$config->shouldUseAceCharge() || 0 >= $amount = $Order->getAceChargeFee()) {
            return;
        }

        $orderItemType = $this->orderItemTypeRepository->find(OrderItemType::CHARGE);
        $taxDisplayType = $this->taxDisplayTypeRepository->find($this->taxDisplayTypeId);
        $taxation = $this->taxTypeRepository->find($this->taxTypeId);

        FeeSeparateHelper::separate(
            $amount,
            $Order,
            $orderItemType,
            $taxDisplayType,
            $taxation,
            ChargeProcessor::class
        );
    }
}
