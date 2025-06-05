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

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Cart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreAddCartEvent extends Event
{
    private AddCartRequestModelInterface $addCartRequestModel;

    private Cart $cart;

    public function __construct(
        AddCartRequestModelInterface $addCartRequestModel,
        Cart $cart,
    ) {
        $this->addCartRequestModel = $addCartRequestModel;
        $this->cart = $cart;
    }

    public function getAddCartRequestModel(): AddCartRequestModelInterface
    {
        return $this->addCartRequestModel;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }
}
