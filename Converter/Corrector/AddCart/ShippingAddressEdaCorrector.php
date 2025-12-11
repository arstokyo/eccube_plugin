<?php

namespace Plugin\AceClient43\Converter\Corrector\AddCart;

use Eccube\Entity\Order;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorInterface;

final class ShippingAddressEdaCorrector implements AddCartRequestCorrectorInterface
{
    use CreateRequestModelTrait;

    public function correct(AddCartRequestModelInterface $request, AddCartFlow $flow, array $context, array $options = []): void
    {
        $processingOrder = $context['processingOrder'] ?? null;

        if (!$processingOrder instanceof Order) {
            return;
        }

        if (null === $shipping = $processingOrder->getShippings()->first()) {
            return;
        }

        $shippingEda = $shipping->getCustomerAddressEdano();
        $memberModel = $request->getPrm()->getMember();

        if (null === $shippingEda) {
            $memberModel->setNmember(null);
        } else {
            $nmemModel = $memberModel->getNmember() ?? $this->createSubModel(NmemberModelInterface::class);
            $nmemModel->setEda((string) $shippingEda);
            $memberModel->setNmember($nmemModel);
        }
    }

    public function supports(AddCartFlow $flow): bool
    {
        return $flow->isCartAdd();
    }
}
