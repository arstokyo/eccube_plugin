<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;

/**
 * カートと受注エンティティ間のデータ同期インターフェース
 */
interface CartOrderSynchronizerInterface
{
    /**
     * カートから受注への同期
     *
     * カートからAce固有フィールドを受注へコピーします。
     * オプションで受注明細もカート明細から同期できます。
     *
     * @param Cart $Cart 同期元カート
     * @param Order $Order 同期先受注
     * @param bool $shouldSyncOrderItem 受注明細を同期するかどうか
     */
    public function syncOrderFromCart(Cart $Cart, Order $Order, bool $shouldSyncOrderItem = false): void;

    /**
     * 受注からカートへの同期
     *
     * 受注からAce固有フィールドをカートへコピーします。
     * オプションで選択的なフィールド同期をサポートします。
     *
     * @param Order $Order 同期元受注
     * @param Cart $Cart 同期先カート
     * @param array $options 同期オプション:
     *                       - include_fields: 同期するフィールド名の配列（ホワイトリスト）
     *                       - exclude_fields: 除外するフィールド名の配列（ブラックリスト、include_fields未指定時のみ有効）
     */
    public function syncCartFromOrder(Order $Order, Cart $Cart, array $options = []): void;

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

    /**
     * 前回のカートから新しいカートへの同期
     *
     * 前回のカートから必要なフィールドを新しいカートへコピーします。
     * 前回のカートがnullの場合はデフォルト設定にフォールバックします。
     *
     * @param Cart $Cart 同期先カート（新規）
     * @param Cart|null $PrevCart 同期元カート（前回）、nullの場合あり
     */
    public function syncCartFromPrevCart(Cart $Cart, ?Cart $PrevCart): void;
}
