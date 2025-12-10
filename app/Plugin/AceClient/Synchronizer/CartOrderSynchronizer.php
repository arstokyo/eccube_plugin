<?php

namespace Plugin\AceClient43\Synchronizer;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;
use Eccube\Repository\Master\OrderItemTypeRepository;
use Plugin\AceClient43\Comparator\ItemCompareInterface;
use Plugin\AceClient43\Service\AceConfigService;

class CartOrderSynchronizer implements CartOrderSynchronizerInterface
{
    protected AceConfigService $aceConfigService;

    protected ItemCompareInterface $itemCompare;

    protected EntityManagerInterface $entityManager;

    protected OrderItemTypeRepository $orderItemTypeRepository;

    public function __construct(AceConfigService $aceConfigService, ItemCompareInterface $itemCompare, EntityManagerInterface $entityManager, OrderItemTypeRepository $orderItemTypeRepository)
    {
        $this->aceConfigService = $aceConfigService;
        $this->itemCompare = $itemCompare;
        $this->entityManager = $entityManager;
        $this->orderItemTypeRepository = $orderItemTypeRepository;
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
        ;

        if ($shouldSyncOrderItem) {
            $matchedOrderItemIds = [];

            // 既存の明細を同期し、見つからない場合は新規作成
            foreach ($Cart->getCartItems() as $CartItem) {
                $matched = false;

                foreach ($Order->getProductOrderItems() as $OrderItem) {
                    if ($this->itemCompare->compareCartItemWithOrderItem($CartItem, $OrderItem)) {
                        $this->syncOrderItemFromCartItem($CartItem, $OrderItem);
                        $matchedOrderItemIds[] = $OrderItem->getId();
                        $matched = true;
                        break;
                    }
                }

                if (!$matched) {
                    // Order に存在しない場合は、CartItem から新規 OrderItem を作成
                    $NewOrderItem = $this->createOrderItemFromCartItem($CartItem);

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

        if ($this->shouldSyncField('ace_transaction_id', $include, $exclude)) {
            $Cart->setAceTransactionId($Order->getAceTransactionId());
        }
        if ($this->shouldSyncField('ace_promotion_discount', $include, $exclude)) {
            $Cart->setAcePromotionDiscount($Order->getAcePromotionDiscount());
        }
        if ($this->shouldSyncField('ace_delivery_fee', $include, $exclude)) {
            $Cart->setAceDeliveryFee($Order->getAceDeliveryFee());
        }
        if ($this->shouldSyncField('ace_charge_fee', $include, $exclude)) {
            $Cart->setAceChargeFee($Order->getAceChargeFee());
        }
        if ($this->shouldSyncField('ace_earnable_point', $include, $exclude)) {
            $Cart->setAceEarnablePoint($Order->getAceEarnablePoint());
        }
    }

    protected function shouldSyncField(string $field, ?array $include, array $exclude): bool
    {
        if (is_array($include)) {
            return in_array($field, $include, true);
        }

        return !in_array($field, $exclude, true);
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
        $OrderItem->setIsPresent($CartItem->isPresent());

        // deep 同期時は数量も同期
        if ($deep) {
            $OrderItem->setQuantity($CartItem->getQuantity());
        }

        return $OrderItem;
    }

    /**
     * CartItem から OrderItem を生成する（商品明細）.
     *
     * 価格はProductClassからではなく、CartItemの価格を設定します。
     * 受注サポートから取得された金額は、CartItemに設定されたため。
     */
    public function createOrderItemFromCartItem(CartItem $CartItem): OrderItem
    {
        $ProductClass = $CartItem->getProductClass();
        $Product = $ProductClass->getProduct();

        $OrderItem = new OrderItem();
        $OrderItem
            ->setProduct($Product)
            ->setProductClass($ProductClass)
            ->setProductName($Product->getName())
            ->setProductCode($ProductClass->getCode())
            ->setPrice($CartItem->getPrice())
            ->setQuantity($CartItem->getQuantity());

        // 明細種別（商品）を設定
        $ProductItemType = $this->orderItemTypeRepository->find(OrderItemType::PRODUCT);
        if ($ProductItemType) {
            $OrderItem->setOrderItemType($ProductItemType);
        }

        // 規格名称を設定
        $ClassCategory1 = $ProductClass->getClassCategory1();
        if (null !== $ClassCategory1) {
            $OrderItem->setClasscategoryName1($ClassCategory1->getName());
            $OrderItem->setClassName1($ClassCategory1->getClassName()->getName());
        }
        $ClassCategory2 = $ProductClass->getClassCategory2();
        if (null !== $ClassCategory2) {
            $OrderItem->setClasscategoryName2($ClassCategory2->getName());
            $OrderItem->setClassName2($ClassCategory2->getClassName()->getName());
        }

        // 追加属性の同期（例: 掛け率・数量など）
        $this->syncOrderItemFromCartItem($CartItem, $OrderItem, true);

        return $OrderItem;
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
    }
}
