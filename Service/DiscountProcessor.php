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
use Eccube\Service\PurchaseFlow\DiscountProcessor as DiscountProcessorInterface;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Entity\OrderTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostProcessDiscountEvent;
use Plugin\AceClient43\Events\PreProcessDiscountEvent;
use Plugin\AceClient43\Repository\ConfigRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DiscountProcessor implements DiscountProcessorInterface
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

    public function removeDiscountItem(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        if (!$itemHolder instanceof Order) {
            return;
        }

        $this->removeDiscountItems($itemHolder);
    }

    private function removeDiscountItems(Order $Order): void
    {
        foreach ($Order->getShippings() as $Shipping) {
            /** @var OrderItem $item */
            foreach ($Shipping->getOrderItems() as $item) {
                if ($item->getProcessorName() == DiscountProcessor::class) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                } elseif ($this->getAceClientConfig()->isUseAceDiscountInstead() && $item->isDiscount()) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addDiscountItem(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        if (!$itemHolder instanceof Order) {
            return null;
        }

        $this->addDiscountItems($itemHolder, $context);
    }

    /**
     * @param Order|OrderTrait $Order
     */
    private function addDiscountItems(Order $Order, PurchaseContext $context): void
    {
        $config = $this->getAceClientConfig();
        $event = new PreProcessDiscountEvent($Order, $config, $context);
        $this->eventDispatcher->dispatch($event, Events::PRE_PROCESS_DISCOUNT_EVENT);

        if (!$event->continue || !$config->isUseAceDiscountInstead() || 0 >= $amount = $Order->getAceDiscountAmount()) {
            return;
        }

        /** @var Order $itemHolder */
        $orderItemType = $this->orderItemTypeRepository->find(OrderItemType::POINT);
        $taxDisplayType = $this->taxDisplayTypeRepository->find(TaxDisplayType::INCLUDED);
        $taxation = $this->taxTypeRepository->find(TaxType::NON_TAXABLE);

        FeeSeparateHelper::separate(
            $amount,
            $Order,
            $orderItemType,
            $taxDisplayType,
            $taxation,
            DiscountProcessor::class
        );

        $this->eventDispatcher->dispatch(
            new PostProcessDiscountEvent($Order, $config, $context),
            Events::POST_PROCESS_DISCOUNT_EVENT
        );
    }

    private function getAceClientConfig(): Config
    {
        return $this->configRepository->get();
    }
}
