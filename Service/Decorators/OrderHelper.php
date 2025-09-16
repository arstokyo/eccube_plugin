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

namespace Plugin\AceClient43\Service\Decorators;

use Detection\MobileDetect;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Customer;
use Eccube\Entity\Master\DeviceType;
use Eccube\Entity\Master\OrderStatus;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Eccube\Entity\Shipping;
use Eccube\Repository\DeliveryRepository;
use Eccube\Repository\Master\DeviceTypeRepository;
use Eccube\Repository\Master\OrderItemTypeRepository;
use Eccube\Repository\Master\OrderStatusRepository;
use Eccube\Repository\Master\PrefRepository;
use Eccube\Repository\OrderRepository;
use Eccube\Repository\PaymentRepository;
use Eccube\Service\OrderHelper as BaseOrderHelper;
use Eccube\Session\Session;
use Plugin\AceClient43\Service\CartOrderSyncService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * 受注ヘルパークラスのデコレータ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderHelper extends BaseOrderHelper
{
    protected EventDispatcherInterface $eventDispatcher;

    protected CartOrderSyncService $cartOrderSyncService;

    public function __construct(
        EntityManagerInterface $entityManager,
        OrderRepository $orderRepository,
        OrderItemTypeRepository $orderItemTypeRepository,
        OrderStatusRepository $orderStatusRepository,
        DeliveryRepository $deliveryRepository,
        PaymentRepository $paymentRepository,
        DeviceTypeRepository $deviceTypeRepository,
        PrefRepository $prefRepository,
        MobileDetect $mobileDetector,
        Session $session,
        AuthorizationCheckerInterface $authorizationChecker,
        TokenStorageInterface $tokenStorage,
        EventDispatcherInterface $eventDispatcher,
        CartOrderSyncService $cartOrderSyncService,
    ) {
        parent::__construct(
            $entityManager,
            $orderRepository,
            $orderItemTypeRepository,
            $orderStatusRepository,
            $deliveryRepository,
            $paymentRepository,
            $deviceTypeRepository,
            $prefRepository,
            $mobileDetector,
            $session,
            $authorizationChecker,
            $tokenStorage
        );
        $this->eventDispatcher = $eventDispatcher;
        $this->cartOrderSyncService = $cartOrderSyncService;
    }

    /**
     * 購入処理中の受注を生成する.
     *
     * @param Customer $Customer
     * @param $CartItems
     *
     * @return Order
     */
    public function createPurchaseProcessingOrder(Cart $Cart, Customer $Customer)
    {
        $OrderStatus = $this->orderStatusRepository->find(OrderStatus::PROCESSING);
        $Order = new Order($OrderStatus);

        $preOrderId = $this->createPreOrderId();
        $Order->setPreOrderId($preOrderId);

        // 顧客情報の設定
        $this->setCustomer($Order, $Customer);

        $DeviceType = $this->deviceTypeRepository->find($this->mobileDetector->isMobile() ? DeviceType::DEVICE_TYPE_MB : DeviceType::DEVICE_TYPE_PC);
        $Order->setDeviceType($DeviceType);

        // 明細情報の設定
        $OrderItems = $this->createOrderItemsFromCartItems($Cart->getCartItems());
        $OrderItemsGroupBySaleType = array_reduce($OrderItems, function ($result, $item) {
            /* @var OrderItem $item */
            $saleTypeId = $item->getProductClass()->getSaleType()->getId();
            $result[$saleTypeId][] = $item;

            return $result;
        }, []);

        foreach ($OrderItemsGroupBySaleType as $OrderItems) {
            $Shipping = $this->createShippingFromCustomer($Customer);
            $Shipping->setOrder($Order);
            $this->addOrderItems($Order, $Shipping, $OrderItems);
            $this->setDefaultDelivery($Shipping);
            $this->entityManager->persist($Shipping);
            $Order->addShipping($Shipping);
        }

        $this->setDefaultPayment($Order);

        $this->cartOrderSyncService->syncOrderFromCart($Cart, $Order);

        $this->entityManager->persist($Order);

        return $Order;
    }

    /**
     * @param Collection|ArrayCollection|CartItem[] $CartItems
     *
     * @return OrderItem[]
     */
    protected function createOrderItemsFromCartItems($CartItems)
    {
        return array_map(function ($item) {
            /* @var CartItem $item */
            return $this->cartOrderSyncService->createOrderItemFromCartItem($item);
        }, $CartItems instanceof Collection ? $CartItems->toArray() : $CartItems);
    }

    /**
     * @param Customer $Customer
     *
     * @return Shipping
     */
    protected function createShippingFromCustomer(Customer $Customer)
    {
        $Shipping = new Shipping();
        $Shipping
            ->setName01($Customer->getName01())
            ->setName02($Customer->getName02())
            ->setKana01($Customer->getKana01())
            ->setKana02($Customer->getKana02())
            ->setCompanyName($Customer->getCompanyName())
            ->setPhoneNumber($Customer->getPhoneNumber())
            ->setPostalCode($Customer->getPostalCode())
            ->setPref($Customer->getPref())
            ->setAddr01($Customer->getAddr01())
            ->setAddr02($Customer->getAddr02());

        return $Shipping;
    }

    /**
     * @param Cart $Cart
     * @param Customer $Customer
     * @param bool $shouldJoin JOIN を利用して受注情報を取得する場合は true
     *
     * @return Order|null
     */
    public function initializeOrder(Cart $Cart, Customer $Customer, bool $shouldJoin = false)
    {
        // 購入処理中の受注情報を取得
        if ($Order = $this->getPurchaseProcessingOrder($Cart->getPreOrderId(), $shouldJoin)) {
            $this->cartOrderSyncService->syncOrderFromCart($Cart, $Order, true);

            return $Order;
        }

        // 受注情報を作成
        $Order = $this->createPurchaseProcessingOrder($Cart, $Customer);
        $Cart->setPreOrderId($Order->getPreOrderId());

        return $Order;
    }

    /**
     * 購入処理中の受注を取得する.
     *
     * @param string|null $preOrderId
     * @param bool $shouldJoin JOIN を利用して受注情報を取得する場合は true
     *
     * @return Order|null
     */
    public function getPurchaseProcessingOrder($preOrderId = null, bool $shouldJoin = false)
    {
        if (null === $preOrderId) {
            return null;
        }

        if ($shouldJoin && method_exists($this->orderRepository, 'getPurchaseProcessingOrderWithJoin')) {
            return $this->orderRepository->getPurchaseProcessingOrderWithJoin($preOrderId);
        }

        return $this->orderRepository->findOneBy([
            'pre_order_id' => $preOrderId,
            'OrderStatus' => OrderStatus::PROCESSING,
        ]);
    }
}
