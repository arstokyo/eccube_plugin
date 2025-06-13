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
use Symfony\Contracts\EventDispatcher\Event;

class OnCompareCartItemProductClassEvent extends Event
{
    public CartItem $cartItem1;

    public CartItem $cartItem2;

    public bool $isHandled = false;

    public bool $isEqual = false;

    public function __construct(CartItem $cartItem1, CartItem $cartItem2)
    {
        $this->cartItem1 = $cartItem1;
        $this->cartItem2 = $cartItem2;
    }
}
