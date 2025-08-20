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

use Eccube\Entity\Cart;
use Symfony\Contracts\EventDispatcher\Event;

class OnNewCartEvent extends Event
{
    private Cart $cart;

    private ?Cart $prevCart;

    public function __construct(Cart $cart, ?Cart $prevCart = null)
    {
        $this->cart = $cart;
        $this->prevCart = $prevCart;
    }

    /**
     * カートを取得
     *
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * 前回のカートを取得
     *
     * @return Cart|null
     */
    public function getPrevCart(): ?Cart
    {
        return $this->prevCart;
    }
}
