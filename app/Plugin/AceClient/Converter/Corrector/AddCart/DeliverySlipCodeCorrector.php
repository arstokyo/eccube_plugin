<?php

namespace Plugin\AceClient43\Converter\Corrector\AddCart;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorInterface;

/**
 * 配送伝票IDの設定
 */
final class DeliverySlipCodeCorrector implements AddCartRequestCorrectorInterface
{
    public function correct(AddCartRequestModelInterface $request, AddCartFlow $flow, array $context, array $options = []): void
    {
        $slipId = null;

        switch ($flow->getValue()) {
            case AddCartFlow::CART_ADD:
                if ($context['cart']->hasAceDeliverySlipId()) {
                    $slipId = $context['cart']->getAceDeliverySlipId();
                }
                break;
            case AddCartFlow::CREATE_ORDER:
            case AddCartFlow::SHOPPING_ADD:
                if ($context['order']->hasAceDeliverySlipId()) {
                    $slipId = $context['order']->getAceDeliverySlipId();
                }
                break;
        }

        $request->getPrm()->getJyuden()->setHcode($slipId);
    }

    public function supports(AddCartFlow $flow): bool
    {
        // 全てのフロー
        return true;
    }
}
