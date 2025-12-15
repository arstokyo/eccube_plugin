<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\CartItem;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\OrderItem;
use Eccube\Repository\Master\OrderItemTypeRepository;

final class ItemSynchronizer implements ItemSynchronizerInterface
{
    private OrderItemTypeRepository $orderItemTypeRepository;

    public function __construct(OrderItemTypeRepository $orderItemTypeRepository)
    {
        $this->orderItemTypeRepository = $orderItemTypeRepository;
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
}
