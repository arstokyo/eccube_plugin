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
use Eccube\Entity\ProductClass;
use Symfony\Contracts\EventDispatcher\Event;

class OnCartAddProductEvent extends Event
{
    public CartItem $cartItem;

    public array $options;

    public ProductClass $productClass;

    public function __construct(CartItem $cartItem, ProductClass $productClass, array $options = [])
    {
        $this->cartItem = $cartItem;
        $this->productClass = $productClass;
        $this->options = $options;
    }
}
