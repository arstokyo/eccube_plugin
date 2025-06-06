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
use Symfony\Contracts\EventDispatcher\Event;

class OnAttachDeliveryFeeToCartEvent extends Event
{
    private float $deliveryFee;
    private AddCartResponseModelInterface $addCartResponse;
    private Cart $cart;
    private array $options;
    private bool $canFlush;
    public bool $continue = true;
    public bool $needFlush = false;

    public function __construct(
        float $deliveryFee,
        AddCartResponseModelInterface $addCartResponse,
        Cart $cart,
        array $options,
        bool $canFlush,
    ) {
        $this->deliveryFee = $deliveryFee;
        $this->addCartResponse = $addCartResponse;
        $this->cart = $cart;
        $this->options = $options;
        $this->canFlush = $canFlush;
    }

    public function getDeliveryFee(): float
    {
        return $this->deliveryFee;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getAddCartResponse(): AddCartResponseModelInterface
    {
        return $this->addCartResponse;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function canFlush(): bool
    {
        return $this->canFlush;
    }
}
