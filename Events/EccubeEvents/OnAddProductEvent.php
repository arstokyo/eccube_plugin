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
use Plugin\AceClient43\Entity\CartItemTrait;
use Symfony\Contracts\EventDispatcher\Event;

class OnAddProductEvent extends Event
{
    private CartItem $cartItem;

    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }

    /**
     * カートアイテムを取得します.
     *
     * @return CartItem|CartItemTrait
     */
    public function getCartItem()
    {
        return $this->cartItem;
    }
}
