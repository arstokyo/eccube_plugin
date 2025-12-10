<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Cart;
use Eccube\Entity\Order;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;
use Plugin\AceClient43\Service\AceConfigService;

/**
 * 通販Aceのカートの送料など同期
 */
class AceCartResponseFeeSynchronizer
{
    protected AceConfigService $aceConfigService;

    public function __construct(
        AceConfigService $aceConfigService,
    ) {
        $this->aceConfigService = $aceConfigService;
    }

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
    public function sync($CartOrder, OrderModelInterface $orderModel, array $context = ['all']): void
    {
        $jyudenModel = $orderModel->getJyuden();
        $config = $this->aceConfigService;

        if ($config->shouldUseAceDelivery() && $this->isGrantFor('delivery_free', $context)) {
            $deliveryFree = $config->isDeliveryFeeDisplayAsIncludedTax()
                ? $jyudenModel->getSouryou()
                : $jyudenModel->getSouryouzn();
            $CartOrder->setAceDeliveryFee($deliveryFree);
        }

        if ($config->shouldUseAceCharge() && $this->isGrantFor('charge_fee', $context)) {
            $chargeFee = $config->isChargeFeeDisplayAsIncludedTax()
                ? $jyudenModel->getTesuu()
                : $jyudenModel->getTesuuzn();
            $CartOrder->setAceChargeFee($chargeFee);
        }

        if ($config->shouldAddPoint() && $this->isGrantFor('point', $context)) {
            $CartOrder->setAceEarnablePoint($orderModel->getPoint()->getPointp());
        }

        if ($config->shouldUseAceDiscount()) {
            if ($this->isGrantFor('promotion_discount', $context)) {
                $promotionDiscountAmount = $config->isDiscountDisplayAsIncludedTax()
                    ? $orderModel->getPromotionDiscount()
                    : $orderModel->getPromotionDiscountExcludedTax();
                $CartOrder->setAcePromotionDiscount($promotionDiscountAmount);
            }

            // Orderのみはポイントの値引きセット。
            if ($CartOrder instanceof Order && $this->isGrantFor('point_discount', $context)) {
                $pointDiscountAmount = $config->isDiscountDisplayAsIncludedTax()
                    ? $orderModel->getPointDiscount()
                    : $orderModel->getPointDiscountExcludedTax();
                $CartOrder->setAcePointDiscount($pointDiscountAmount);
            }
        }

        if ($this->isGrantFor('ace_delivery_split_id', $context)) {
            $CartOrder->setAceDeliverySlipId($jyudenModel->getHcode());
        }
    }

    protected function isGrantFor(string $fee, array $context): bool
    {
        return empty($context) || !empty(array_intersect($context, ['all', $fee]));
    }
}
