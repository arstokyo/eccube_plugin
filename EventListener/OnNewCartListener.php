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
use Plugin\AceClient43\Repository\ConfigRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OnNewCartListener implements EventSubscriberInterface
{
    /**
     * @var ConfigRepository
     */
    private ConfigRepository $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
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
        $config = $this->configRepository->get();

        $cart->setAcePaymentId($config->getDefaultPaymentId())
            ->setAceTransactionId($config->getDefaultTransactionType())
            ->setEnableAceOrderSupport($config->isOrderSupportEnabled());
    }
}
