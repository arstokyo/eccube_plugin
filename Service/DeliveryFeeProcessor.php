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
use Eccube\Service\PurchaseFlow\ItemHolderPreprocessor;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\OrderTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostProcessDeliveryFeeEvent;
use Plugin\AceClient43\Events\PreProcessDeliveryFeeEvent;
use Plugin\AceClient43\Repository\ConfigRepository;
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
    private EntityManagerInterface $entityManager;

    /**
     * @var EventDispatcherInterface
     */
    private EventDispatcherInterface $eventDispatcher;

    private ConfigRepository $configRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher,
        ConfigRepository $config,
    ) {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->configRepository = $config;
    }

    /**
     * @param ItemHolderInterface|Order $itemHolder
     * @param PurchaseContext $context
     *
     * @throws \Doctrine\ORM\NoResultException
     */
    public function process(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        $config = $this->getAceClientConfig();
        $event = new PreProcessDeliveryFeeEvent($itemHolder, $config, $context);
        $this->eventDispatcher->dispatch($event, Events::PRE_PROCESS_DELIVERY_FEE_EVENT);

        if (!$event->continue) {
            return;
        }

        $this->removeDeliveryFeeItems($itemHolder, $config);
        $this->addDeliveryFeeItems($itemHolder, $config);

        $this->eventDispatcher->dispatch(
            new PostProcessDeliveryFeeEvent($itemHolder, $config, $context),
            Events::POST_PROCESS_DELIVERY_FEE_EVENT
        );
    }

    private function removeDeliveryFeeItems(Order $Order, Config $config): void
    {
        foreach ($Order->getShippings() as $Shipping) {
            foreach ($Shipping->getOrderItems() as $item) {
                if ($item->getProcessorName() == DeliveryFeeProcessor::class) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                } elseif ($config->isUseAceDelivery() && $item->isDeliveryFee()) {
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
        if (!$config->isUseAceDelivery() || 0 >= $fee = $Order->getAceDeliveryFee()) {
            return;
        }

        $DeliveryFeeType = $this->entityManager->find(OrderItemType::class, OrderItemType::DELIVERY_FEE);
        $TaxInclude = $this->entityManager->find(TaxDisplayType::class, TaxDisplayType::INCLUDED);
        $Taxation = $this->entityManager->find(TaxType::class, TaxType::TAXATION);

        FeeSeparateHelper::separate(
            $fee,
            $Order,
            $DeliveryFeeType,
            $TaxInclude,
            $Taxation,
            DeliveryFeeProcessor::class
        );
    }

    private function getAceClientConfig(): Config
    {
        return $this->configRepository->get();
    }
}
