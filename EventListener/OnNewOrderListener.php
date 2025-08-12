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
use Plugin\AceClient43\Events\EccubeEvents\OnNewOrderEvent;
use Plugin\AceClient43\Service\Decorators\OrderHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OnNewOrderListener implements EventSubscriberInterface
{
    private OrderHelper $orderHelper;

    public function __construct(OrderHelper $orderHelper)
    {
        $this->orderHelper = $orderHelper;
    }

    public static function getSubscribedEvents()
    {
        return [
            Events::ON_NEW_ORDER => ['onNewOrder', 100],
        ];
    }

    public function onNewOrder(OnNewOrderEvent $event)
    {
        $order = $event->order;
        $cart = $event->cart;
        $this->orderHelper->syncOrderFromCart($cart, $order);
    }
}
