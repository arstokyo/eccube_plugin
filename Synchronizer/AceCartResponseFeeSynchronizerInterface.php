<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Cart;
use Eccube\Entity\Order;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;

/**
 * 通販Aceのカートの送料など同期
 */
interface AceCartResponseFeeSynchronizerInterface
{
    /**
     * 指定された設定とコンテキストに基づいてカートの料金を同期します。
     *
     * このメソッドは、提供されたカート注文に対して、送料、手数料、獲得ポイント、
     * プロモーション割引などの料金関連の更新を適用します。これらの更新の動作は、
     * 設定サービスと指定されたコンテキストに依存します。
     *
     * @param Cart|Order $CartOrder 料金を更新するカート注文オブジェクト
     * @param OrderModelInterface $orderModel 料金と割引データを含む注文モデル
     * @param array $context 適用する料金をフィルタリングするためのオプションのコンテキスト
     *
     * @return void
     */
    public function sync($CartOrder, OrderModelInterface $orderModel, array $context = ['all']): void;
}
