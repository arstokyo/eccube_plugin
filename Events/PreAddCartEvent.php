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
use Plugin\AceClient43\Entity\Config;
use Symfony\Contracts\EventDispatcher\Event;

class PreAddCartEvent extends Event
{
    private AddCartRequestModelInterface $addCartRequestModel;

    private Cart $cart;

    private array $options;

    private Config $config;

    public function __construct(
        AddCartRequestModelInterface $addCartRequestModel,
        Cart $cart,
        array $options,
        Config $config,
    ) {
        $this->addCartRequestModel = $addCartRequestModel;
        $this->cart = $cart;
        $this->options = $options;
        $this->config = $config;
    }

    public function getAddCartRequestModel(): AddCartRequestModelInterface
    {
        return $this->addCartRequestModel;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }
}
