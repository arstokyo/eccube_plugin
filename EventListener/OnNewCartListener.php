<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\EventListener;

use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnNewCartEvent;
use Plugin\AceClient43\Service\AceConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OnNewCartListener implements EventSubscriberInterface
{
    private AceConfigService $aceConfigService;

    public function __construct(AceConfigService $aceConfigService)
    {
        $this->aceConfigService = $aceConfigService;
    }

    public static function getSubscribedEvents()
    {
        return [
            Events::ON_NEW_CART => ['onNewCart', 100],
        ];
    }

    public function onNewCart(OnNewCartEvent $event)
    {
        $cart = $event->getCart();
        $prevCart = $event->getPrevCart();

        if ($prevCart) {
            $cart->setAcePaymentId($prevCart->getAcePaymentId());
            $cart->setAceTransactionId($prevCart->getAceTransactionId());
            $cart->setEnableAceOrderSupport($prevCart->isAceOrderSupportEnabled());
            $cart->setAceDeliveryFee($prevCart->getAceDeliveryFee());
            $cart->setAceDiscountAmount($prevCart->getAceDiscountAmount());
            $cart->setAceChargeFee($prevCart->getAceChargeFee());
            $cart->setAceEarnablePoint($prevCart->getAceEarnablePoint());

            return;
        }

        $cart->setAcePaymentId($this->aceConfigService->getDefaultPaymentId())
            ->setAceTransactionId($this->aceConfigService->getDefaultTransactionType())
            ->setEnableAceOrderSupport($this->aceConfigService->isOrderSupportEnabled());
    }
}
