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
    protected AceCartResponseFeeSynchronizer $feeSynchronizer;

    public function __construct(
        AceCartResponseFeeSynchronizer $feeSynchronizer,
    ) {
        $this->feeSynchronizer = $feeSynchronizer;
    }

    /**
     * {@inheritDoc}
     */
    public function syncOrderFees(Order $order, OrderModelInterface $orderModel, string $context = 'all'): void
    {
        $this->feeSynchronizer->sync($order, $orderModel, $context);
    }
}
