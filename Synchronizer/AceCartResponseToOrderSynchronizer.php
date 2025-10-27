<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Order;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;

/**
 * 通販Aceの受注同期ヘルパー
 *
 * 目的:
 * - OrderBridgeから受注更新ロジックを分離し、単一責任の原則に従う
 * - AddCart APIレスポンスから受注エンティティへの同期を一元管理
 */
class AceCartResponseToOrderSynchronizer implements AceCartResponseToOrderSynchronizerInterface
{
    /**
     * {@inheritDoc}
     */
    public function syncOrderFees(Order $order, OrderModelInterface $orderModel, string $context = 'all'): void
    {
        if (in_array($context, ['delivery_free', 'all'])) {
            $order->setAceDeliveryFee($orderModel->getJyuden()->getSouryou());
        }

        if (in_array($context, ['charge_fee', 'all'])) {
            $order->setAceChargeFee($orderModel->getJyuden()->getTesuu());
        }

        if (in_array($context, ['point', 'all'])) {
            $order->setAceEarnablePoint($orderModel->getEarnablePoints());
        }

        if (in_array($context, ['point_discount', 'all'])) {
            $order->setAcePointDiscount($orderModel->getPointDiscount());
        }

        if (in_array($context, ['promotion_discount', 'all'])) {
            $order->setAcePromotionDiscount($orderModel->getPromotionDiscount());
        }
    }
}
