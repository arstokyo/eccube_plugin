<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Order;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;

/**
 * 通販AceのAddCartレスポンスから受注への同期インターフェース
 */
interface AceCartResponseToOrderSynchronizerInterface
{
    /**
     * 受注の手数料情報を同期する
     *
     * 通販Aceの配送料・手数料・ポイント・割引額を受注へ同期します。
     *
     * @param Order $order 同期先受注
     * @param OrderModelInterface $orderModel 同期元の通販Ace受注モデル
     * @param string $context 同期コンテキスト: 'promotion_discount'|'point_discount'|'charge_fee'|'delivery_free'|'point'|'all'
     */
    public function syncOrderFees(Order $order, OrderModelInterface $orderModel, string $context = 'all'): void;
}
