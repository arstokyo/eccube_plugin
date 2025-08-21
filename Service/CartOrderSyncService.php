<?php

namespace Plugin\AceClient43\Service;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;

class CartOrderSyncService
{
    protected AceConfigService $aceConfigService;

    public function __construct(AceConfigService $aceConfigService)
    {
        $this->aceConfigService = $aceConfigService;
    }

    /**
     * Cart -> Order の同期
     */
    public function syncOrderFromCart(Cart $Cart, Order $Order): void
    {
        $Order->setAceTransactionId($Cart->getAceTransactionId())
            ->setAcePaymentId($Cart->getAcePaymentId())
            ->setAceDiscountAmount($Cart->getAceDiscountAmount())
            ->setAceDeliveryFee($Cart->getAceDeliveryFee())
            ->setAceChargeFee($Cart->getAceChargeFee())
            ->setAceEarnablePoint($Cart->getAceEarnablePoint());
    }

    /**
     * Order -> Cart の同期
     */
    public function syncCartFromOrder(Order $Order, Cart $Cart): void
    {
        $Cart->setAceTransactionId($Order->getAceTransactionId())
            ->setAcePaymentId($Order->getAcePaymentId())
            ->setAceDiscountAmount($Order->getAceDiscountAmount())
            ->setAceDeliveryFee($Order->getAceDeliveryFee())
            ->setAceChargeFee($Order->getAceChargeFee())
            ->setAceEarnablePoint($Order->getAceEarnablePoint());
    }

    /**
     * CartItem -> OrderItem の同期（内容コピー）
     *
     * 既存の OrderItem インスタンスへ CartItem の情報を反映します。
     *
     * @return OrderItem 同期後の OrderItem
     */
    public function syncOrderItemFromCartItem(CartItem $CartItem, OrderItem $OrderItem): OrderItem
    {
        $OrderItem->setAceMarkupRate($CartItem->getAceMarkupRate());

        return $OrderItem;
    }

    /**
     * 旧Cart -> 新Cart の同期（必要項目のみ）
     */
    public function syncCartFromPrevCart(Cart $Cart, ?Cart $PrevCart): void
    {
        if (!$PrevCart) {
            $Cart->setAcePaymentId($this->aceConfigService->getDefaultPaymentId())
                ->setAceTransactionId($this->aceConfigService->getDefaultTransactionType())
                ->setEnableAceOrderSupport($this->aceConfigService->isOrderSupportEnabled());

            return;
        }

        $Cart->setAcePaymentId($PrevCart->getAcePaymentId());
        $Cart->setAceTransactionId($PrevCart->getAceTransactionId());
        $Cart->setEnableAceOrderSupport($PrevCart->isAceOrderSupportEnabled());
        $Cart->setAceDeliveryFee($PrevCart->getAceDeliveryFee());
        $Cart->setAceDiscountAmount($PrevCart->getAceDiscountAmount());
        $Cart->setAceChargeFee($PrevCart->getAceChargeFee());
        $Cart->setAceEarnablePoint($PrevCart->getAceEarnablePoint());
    }
}
