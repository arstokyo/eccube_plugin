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
     *
     * options:
     * - include_fields: 同期対象フィールドのリスト（指定がある場合はこちらを優先）
     * - exclude_fields: 除外フィールドのリスト（include_fields 未指定時のみ有効）
     */
    public function syncCartFromOrder(Order $Order, Cart $Cart, array $options = []): void
    {
        $include = isset($options['include_fields']) && is_array($options['include_fields']) ? $options['include_fields'] : null;
        $exclude = isset($options['exclude_fields']) && is_array($options['exclude_fields']) ? $options['exclude_fields'] : [];

        $sync = function (string $field, callable $setter) use ($include, $exclude) {
            if (is_array($include)) {
                if (!in_array($field, $include, true)) {
                    return;
                }
            } else {
                if (in_array($field, $exclude, true)) {
                    return;
                }
            }
            $setter();
        };

        $sync('ace_transaction_id', function () use ($Order, $Cart) {
            $Cart->setAceTransactionId($Order->getAceTransactionId());
        });
        $sync('ace_payment_id', function () use ($Order, $Cart) {
            $Cart->setAcePaymentId($Order->getAcePaymentId());
        });
        $sync('ace_discount_amount', function () use ($Order, $Cart) {
            $Cart->setAceDiscountAmount($Order->getAceDiscountAmount());
        });
        $sync('ace_delivery_fee', function () use ($Order, $Cart) {
            $Cart->setAceDeliveryFee($Order->getAceDeliveryFee());
        });
        $sync('ace_charge_fee', function () use ($Order, $Cart) {
            $Cart->setAceChargeFee($Order->getAceChargeFee());
        });
        $sync('ace_earnable_point', function () use ($Order, $Cart) {
            $Cart->setAceEarnablePoint($Order->getAceEarnablePoint());
        });
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
