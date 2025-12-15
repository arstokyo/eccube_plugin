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
