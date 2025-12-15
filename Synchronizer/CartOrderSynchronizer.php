<?php

namespace Plugin\AceClient43\Synchronizer;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Eccube\Repository\Master\OrderItemTypeRepository;
use Plugin\AceClient43\Comparator\ItemComparatorInterface;
use Plugin\AceClient43\Service\AceConfigService;

final class CartOrderSynchronizer implements CartOrderSynchronizerInterface
{
    private AceConfigService $aceConfigService;
    private ItemComparatorInterface $itemComparator;
    private EntityManagerInterface $entityManager;
    private ItemSynchronizerInterface $itemSynchronizer;

    public function __construct(
        AceConfigService $aceConfigService,
        ItemComparatorInterface $itemComparator,
        EntityManagerInterface $entityManager,
        ItemSynchronizerInterface $itemSynchronizer,
    ) {
        $this->aceConfigService = $aceConfigService;
        $this->itemComparator = $itemComparator;
        $this->entityManager = $entityManager;
        $this->itemSynchronizer = $itemSynchronizer;
    }

    /**
     * Cart -> Order の同期
     */
    public function syncOrderFromCart(Cart $Cart, Order $Order, bool $shouldSyncOrderItem = false): void
    {
        $Order->setAceTransactionId($Cart->getAceTransactionId())
            ->setAceDeliveryFee($Cart->getAceDeliveryFee())
            ->setAceChargeFee($Cart->getAceChargeFee())
            ->setAceEarnablePoint($Cart->getAceEarnablePoint())
            ->setAcePromotionDiscount($Cart->getAcePromotionDiscount())
            ->setAceDeliverySlipId($Cart->getAceDeliverySlipId())
        ;

        if ($shouldSyncOrderItem) {
            $matchedOrderItemIds = [];

            // 既存の明細を同期し、見つからない場合は新規作成
            foreach ($Cart->getCartItems() as $CartItem) {
                $matched = false;

                foreach ($Order->getProductOrderItems() as $OrderItem) {
                    if ($this->itemComparator->compareCartItemWithOrderItem($CartItem, $OrderItem)) {
                        $this->itemSynchronizer->syncOrderItemFromCartItem($CartItem, $OrderItem);
                        $matchedOrderItemIds[] = $OrderItem->getId();
                        $matched = true;
                        break;
                    }
                }

                if (!$matched) {
                    // Order に存在しない場合は、CartItem から新規 OrderItem を作成
                    $NewOrderItem = $this->itemSynchronizer->createOrderItemFromCartItem($CartItem);

                    // 受注へ追加
                    $Order->addOrderItem($NewOrderItem);
                    $NewOrderItem->setOrder($Order);

                    // 既定の配送先（先頭）に明細を紐付ける（存在する場合）
                    $Shippings = $Order->getShippings();
                    if ($Shippings->count() > 0) {
                        $DefaultShipping = $Shippings->first();
                        if ($DefaultShipping) {
                            $DefaultShipping->addOrderItem($NewOrderItem);
                            $NewOrderItem->setShipping($DefaultShipping);
                        }
                    }
                }
            }

            // いずれの CartItem とも一致しなかった商品明細を削除
            foreach ($Order->getProductOrderItems() as $OrderItem) {
                // 新規に追加された未永続化の明細はスキップ
                if ($OrderItem->getId() === null) {
                    continue;
                }

                if (!in_array($OrderItem->getId(), $matchedOrderItemIds, true)) {
                    $Order->removeOrderItem($OrderItem);
                    $this->entityManager->remove($OrderItem);
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

        if (self::shouldSyncField('ace_transaction_id', $include, $exclude)) {
            $Cart->setAceTransactionId($Order->getAceTransactionId());
        }
        if (self::shouldSyncField('ace_promotion_discount', $include, $exclude)) {
            $Cart->setAcePromotionDiscount($Order->getAcePromotionDiscount());
        }
        if (self::shouldSyncField('ace_delivery_fee', $include, $exclude)) {
            $Cart->setAceDeliveryFee($Order->getAceDeliveryFee());
        }
        if (self::shouldSyncField('ace_charge_fee', $include, $exclude)) {
            $Cart->setAceChargeFee($Order->getAceChargeFee());
        }
        if (self::shouldSyncField('ace_earnable_point', $include, $exclude)) {
            $Cart->setAceEarnablePoint($Order->getAceEarnablePoint());
        }
        if (self::shouldSyncField('ace_delivery_split_id', $include, $exclude)) {
            $Cart->setAceDeliverySlipId($Order->getAceDeliverySlipId());
        }
    }

    public static function shouldSyncField(string $field, ?array $include, array $exclude): bool
    {
        if (is_array($include)) {
            return in_array($field, $include, true);
        }

        return !in_array($field, $exclude, true);
    }

    /**
     * 旧Cart -> 新Cart の同期（必要項目のみ）
     */
    public function syncCartFromPrevCart(Cart $Cart, ?Cart $PrevCart): void
    {
        if (!$PrevCart) {
            $Cart->setAceTransactionId($this->aceConfigService->getDefaultTransactionType());

            return;
        }

        $Cart->setAceTransactionId($PrevCart->getAceTransactionId());
        $Cart->setAceDeliveryFee($PrevCart->getAceDeliveryFee());
        $Cart->setAcePromotionDiscount($PrevCart->getAcePromotionDiscount());
        $Cart->setAceChargeFee($PrevCart->getAceChargeFee());
        $Cart->setAceEarnablePoint($PrevCart->getAceEarnablePoint());
        $Cart->setAceDeliverySlipId($PrevCart->getAceDeliverySlipId());
    }
}
