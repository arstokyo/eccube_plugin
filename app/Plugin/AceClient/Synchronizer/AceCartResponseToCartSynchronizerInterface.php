<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Cart;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;

/**
 * 通販AceのAddCartレスポンスからカートへの同期インターフェース
 */
interface AceCartResponseToCartSynchronizerInterface
{
    /**
     * カート明細を同期する
     *
     * 通販AceのJyumei（受注明細）をカート明細へ同期します。
     * 差分更新により、既存明細の更新・新規追加・削除を行います。
     *
     * @param Cart $Cart 同期先カート
     * @param OrderModelInterface $orderModel 同期元の通販Ace受注モデル
     * @param array $options 同期オプション:
     *                       - exclude_from_sync: 同期から除外する商品コードの配列
     */
    public function syncCartItems(Cart $Cart, OrderModelInterface $orderModel, array &$options): void;

    /**
     * カート手数料を同期する
     *
     * 通販Aceの配送料・手数料・ポイント・割引額をカートへ同期します。
     *
     * @param Cart $Cart 同期先カート
     * @param OrderModelInterface $orderModel 同期元の通販Ace受注モデル
     */
    public function syncCartFees(Cart $Cart, OrderModelInterface $orderModel): void;
}
