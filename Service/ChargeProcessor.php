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

namespace Plugin\AceClient43\Service;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\TaxDisplayType;
use Eccube\Entity\Master\TaxType;
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
use Plugin\AceClient43\Repository\ConfigRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * 受注サポートから振られている送料をOrderItemに変換するPreprocessor.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ChargeProcessor implements ItemHolderPreprocessor
{
    private EntityManagerInterface $entityManager;

    private EventDispatcherInterface $eventDispatcher;

    private ConfigRepository $configRepository;

    protected OrderItemTypeRepository $orderItemTypeRepository;

    protected TaxDisplayTypeRepository $taxDisplayTypeRepository;

    protected TaxTypeRepository $taxTypeRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher,
        ConfigRepository $config,
        OrderItemTypeRepository $orderItemTypeRepository,
        TaxDisplayTypeRepository $taxDisplayTypeRepository,
        TaxTypeRepository $taxTypeRepository,
    ) {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->configRepository = $config;
        $this->orderItemTypeRepository = $orderItemTypeRepository;
        $this->taxDisplayTypeRepository = $taxDisplayTypeRepository;
        $this->taxTypeRepository = $taxTypeRepository;
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

        $config = $this->getAceClientConfig();
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
                } elseif ($config->isUseAceCharge() && $item->isCharge()) {
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
        if (!$config->isUseAceCharge() || 0 >= $amount = $Order->getAceChargeFee()) {
            return;
        }

        $orderItemType = $this->orderItemTypeRepository->find(OrderItemType::CHARGE);
        $taxDisplayType = $this->taxDisplayTypeRepository->find(TaxDisplayType::INCLUDED);
        $taxation = $this->taxTypeRepository->find(TaxType::TAXATION);

        FeeSeparateHelper::separate(
            $amount,
            $Order,
            $orderItemType,
            $taxDisplayType,
            $taxation,
            ChargeProcessor::class
        );
    }

    private function getAceClientConfig(): Config
    {
        return $this->configRepository->get();
    }
}
