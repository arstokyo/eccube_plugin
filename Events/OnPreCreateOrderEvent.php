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

use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\Entity\Config;
use Symfony\Contracts\EventDispatcher\Event;

class OnPreCreateOrderEvent extends Event
{
    /** @var float */
    private float $charge;

    /** @var float */
    private float $discount;

    /** @var float */
    private float $deliveryFee = 0;

    /** @var Shipping */
    private Shipping $shipping;

    /** @var Config */
    private Config $config;

    private CreateOrderRequestModelInterface $createOrderRequest;

    private array $options;

    public function __construct(
        float $charge,
        float $discount,
        float $deliveryFee,
        CreateOrderRequestModelInterface $createOrderRequest,
        Shipping $shipping,
        Config $config,
        array $options,
    ) {
        $this->charge = $charge;
        $this->discount = $discount;
        $this->deliveryFee = $deliveryFee;
        $this->config = $config;
        $this->shipping = $shipping;
        $this->createOrderRequest = $createOrderRequest;
        $this->options = $options;
    }

    public function getCharge(): float
    {
        return $this->charge;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function getDeliveryFee(): float
    {
        return $this->deliveryFee;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function getCreateOrderRequest(): CreateOrderRequestModelInterface
    {
        return $this->createOrderRequest;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
