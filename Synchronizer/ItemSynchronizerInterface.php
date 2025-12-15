<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;

/**
 * カートと受注エンティティ間のデータ同期インターフェース
 */
interface ItemSynchronizerInterface
{
    /**
     * カート明細から受注明細への同期
     *
     * 既存の受注明細をカート明細のデータで更新します。
     *
     * @param CartItem $CartItem 同期元カート明細
     * @param OrderItem $OrderItem 更新対象の受注明細
     * @param bool $deep 数量も同期するか（深い同期）
     *
     * @return OrderItem 同期後の受注明細
     */
    public function syncOrderItemFromCartItem(CartItem $CartItem, OrderItem $OrderItem, bool $deep = true): OrderItem;

    /**
     * カート明細から受注明細を新規作成
     *
     * カート明細のデータを基に新しい商品受注明細を作成します。
     *
     * @param CartItem $CartItem 同期元カート明細
     *
     * @return OrderItem 新規作成された受注明細
     */
    public function createOrderItemFromCartItem(CartItem $CartItem): OrderItem;
}
