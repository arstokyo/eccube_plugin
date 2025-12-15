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
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\OrderStatus;
use Eccube\Entity\Master\TaxDisplayType;
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
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Synchronizer\CartOrderSynchronizerInterface;
use Plugin\AceClient43\Synchronizer\ItemSynchronizerInterface;
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
    protected CartOrderSynchronizerInterface $cartOrderSyncService;
    protected ItemSynchronizerInterface $itemSynchronizer;
    protected AceConfigService $aceConfigService;

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
        CartOrderSynchronizerInterface $cartOrderSyncService,
        ItemSynchronizerInterface $itemSynchronizer,
        AceConfigService $aceConfigService,
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
            $tokenStorage,
        );
        $this->eventDispatcher = $eventDispatcher;
        $this->cartOrderSyncService = $cartOrderSyncService;
        $this->itemSynchronizer = $itemSynchronizer;
        $this->aceConfigService = $aceConfigService;
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
            return $this->itemSynchronizer->createOrderItemFromCartItem($item);
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

    /**
     * @param Cart $Cart
     *
     * @return bool
     */
    public function verifyCart(Cart $Cart)
    {
        if (count($Cart->getCartItems()) > 0) {
            $divide = $this->session->get(self::SESSION_CART_DIVIDE_FLAG);
            if ($divide) {
                log_info('ログイン時に販売種別が異なる商品がカートと結合されました。');

                return false;
            }

            // いずれかのカートアイテムが「未確定(Dirty)」の場合は購入フローへ進ませない
            if ($Cart->hasDirtyItem()) {
                log_info('カートアイテムが未確定のため, カート画面へ遷移します。');

                return false;
            }

            return true;
        }

        log_info('カートに商品が入っていません。');

        return false;
    }

    /**
     * 税表示区分を取得する.
     *
     * - 商品: 税込
     *
     * @param $OrderItemType
     *
     * @return TaxDisplayType
     */
    public function getTaxDisplayType($OrderItemType)
    {
        if ($OrderItemType instanceof OrderItemType) {
            $OrderItemType = $OrderItemType->getId();
        }

        // デフォルト通販Ace側の価格は税込で採用します。
        if ($OrderItemType === OrderItemType::PRODUCT) {
            $type = $this->aceConfigService->isProductDisplayAsIncludedTax()
                ? TaxDisplayType::INCLUDED
                : TaxDisplayType::EXCLUDED;
            return $this->entityManager->find(TaxDisplayType::class, $type);
        }

        return parent::getTaxDisplayType($OrderItemType);
    }
}
