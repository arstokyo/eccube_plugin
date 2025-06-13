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

namespace Plugin\AceClient43\Events\EccubeEvents;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Symfony\Contracts\EventDispatcher\Event;

class OnNewOrderItemFromCartItemEvent extends Event
{
    public OrderItem $orderItem;

    public CartItem $cartItem;

    public function __construct(OrderItem $orderItem, CartItem $cartItem)
    {
        $this->orderItem = $orderItem;
        $this->cartItem = $cartItem;
    }
}
