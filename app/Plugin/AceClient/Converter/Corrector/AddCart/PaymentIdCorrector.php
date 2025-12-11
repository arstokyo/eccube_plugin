<?php

namespace Plugin\AceClient43\Converter\Corrector\AddCart;

use Eccube\Entity\Order;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorInterface;
use Plugin\AceClient43\Service\AceConfigService;

final class PaymentIdCorrector implements AddCartRequestCorrectorInterface
{
    private AceConfigService $aceConfigService;

    public function __construct(
        AceConfigService $aceConfigService,
    ) {
        $this->aceConfigService = $aceConfigService;
    }

    public function correct(AddCartRequestModelInterface $request, AddCartFlow $flow, array $context, array $options = []): void
    {
        $jyudenModel = $request->getPrm()->getJyuden();
        // すでに設定された場合は何もしない。
        if ($jyudenModel->hasPcode()) {
            return;
        }

        $pcode = (int) $this->aceConfigService->getDefaultPaymentId();

        switch ($flow->getValue()) {
            case AddCartFlow::CART_ADD:
                if (null !== ($processingOrder = $context['processingOrder'] ?? null) && $processingOrder instanceof Order && $processingOrder->hasAcePaymentId()) {
                    $pcode = $processingOrder->getAcePaymentId();
                }
                break;
            case AddCartFlow::CREATE_ORDER:
            case AddCartFlow::SHOPPING_ADD:
                if ($context['order']->hasAcePaymentId()) {
                    $pcode = $context['order']->getAcePaymentId();
                }
                break;
        }


        $jyudenModel->setPcode($pcode);
    }

    public function supports(AddCartFlow $flow): bool
    {
        // 全てのフロー
        return true;
    }
}
