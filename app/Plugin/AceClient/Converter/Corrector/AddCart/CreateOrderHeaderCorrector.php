<?php

namespace Plugin\AceClient43\Converter\Corrector\AddCart;

use Eccube\Entity\DeliveryTime;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Eccube\Repository\DeliveryTimeRepository;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorInterface;

/**
 * 受注作成時のJyudenHeader設定
 */
final class CreateOrderHeaderCorrector implements AddCartRequestCorrectorInterface
{
    private DeliveryTimeRepository $deliveryTimeRepository;

    public function __construct(
        DeliveryTimeRepository $deliveryTimeRepository,
    ) {
        $this->deliveryTimeRepository = $deliveryTimeRepository;
    }

    public function correct(AddCartRequestModelInterface $request, AddCartFlow $flow, array $context, array $options = []): void
    {
        /** @var Order $order */
        /** @var Shipping $shipping */
        $order = $context['order'];
        $shipping = $context['shipping'];

        $jyuden = $request->getPrm()->getJyuden();
        $jyuden
            ->setPointm($order->getUsePoint())
            ->setNbikou1($order->getMessage())
            ->setHday($shipping->getShippingDeliveryDate())
            ->setWeborderno($order->getId());

        // 配送時間IDを設定
        if (null === $deliveryTimeId = $shipping->getTimeId()) {
            return;
        }

        $deliveryTime = $this->deliveryTimeRepository->findOneBy(['id' => $deliveryTimeId]);
        if (!$deliveryTime instanceof DeliveryTime) {
            return;
        }

        $jyuden->setHtime($deliveryTime->getAceDeliveryTimeId());
    }

    public function supports(AddCartFlow $flow): bool
    {
        return $flow->isCreateOrder();
    }
}
