<?php

namespace Plugin\AceClient43\Service;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\Service\Contract\ItemCompareInterface;

class CartOrderSyncService
{
    protected AceConfigService $aceConfigService;

    protected ItemCompareInterface $itemCompare;

    public function __construct(AceConfigService $aceConfigService, ItemCompareInterface $itemCompare)
    {
        $this->aceConfigService = $aceConfigService;
        $this->itemCompare = $itemCompare;
    }

    /**
     * Cart -> Order の同期
     */
    public function syncOrderFromCart(Cart $Cart, Order $Order, bool $shouldSyncOrderItem = false): void
    {
        $Order->setAceTransactionId($Cart->getAceTransactionId())
            ->setAcePaymentId($Cart->getAcePaymentId())
            ->setAceDiscountAmount($Cart->getAceDiscountAmount())
            ->setAceDeliveryFee($Cart->getAceDeliveryFee())
            ->setAceChargeFee($Cart->getAceChargeFee())
            ->setAceEarnablePoint($Cart->getAceEarnablePoint());

        if ($shouldSyncOrderItem) {
            foreach ($Cart->getCartItems() as $CartItem) {
                foreach ($Order->getProductOrderItems() as $OrderItem) {
                    if ($this->itemCompare->compareCartItemWithOrderItem($CartItem, $OrderItem)) {
                        $this->syncOrderItemFromCartItem($CartItem, $OrderItem);

                        break;
                    }
                }
            }
        }
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
     * deep=true の場合は数量も同期します。
     *
     * @return OrderItem 同期後の OrderItem
     */
    public function syncOrderItemFromCartItem(CartItem $CartItem, OrderItem $OrderItem, bool $deep = true): OrderItem
    {
        // マークアップ率の同期
        $OrderItem->setAceMarkupRate($CartItem->getAceMarkupRate());

        // deep 同期時は数量も同期
        if ($deep) {
            $OrderItem->setQuantity($CartItem->getQuantity());
        }

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
