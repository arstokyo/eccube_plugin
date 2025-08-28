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
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\Entity\Config;
use Symfony\Contracts\EventDispatcher\Event;

class PostAddCartEvent extends Event
{
    private AddCartResponseModelInterface $addCartResponseModel;

    private Cart $cart;

    private array $options;

    private Config $config;

    public function __construct(
        AddCartResponseModelInterface $addCartResponseModel,
        Cart $cart,
        array $options,
        Config $config,
    ) {
        $this->addCartResponseModel = $addCartResponseModel;
        $this->cart = $cart;
        $this->options = $options;
        $this->config = $config;
    }

    public function getAddCartResponseModel(): AddCartResponseModelInterface
    {
        return $this->addCartResponseModel;
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

    public function getTrigger(): string
    {
        return $this->options['trigger'] ?? '';
    }
}
