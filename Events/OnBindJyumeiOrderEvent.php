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

use Eccube\Entity\OrderItem;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\JyudenModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\JyumeiModelInterface;
use Plugin\AceClient43\Entity\Config;
use Symfony\Contracts\EventDispatcher\Event;

class OnBindJyumeiOrderEvent extends Event
{
    /** @var JyumeiModelInterface */
    private $jyumei;

    /** @var array */
    private $jyumeis;

    /** @var float */
    private $charge;

    /** @var float */
    private $discount;

    /** @var OrderItem */
    private $orderItem;

    /** @var Shipping */
    private $shipping;

    /** @var Config */
    private $config;

    /** @var JyudenModelInterface */
    private $jyuden;
    private $options;

    public function __construct(
        ?JyumeiModelInterface $jyumei,
        array $jyumeis,
        float $charge,
        float $discount,
        OrderItem $orderItem,
        Shipping $shipping,
        Config $config,
        JyudenModelInterface $jyuden,
        array $options,
    ) {
        $this->jyumei = $jyumei;
        $this->jyumeis = $jyumeis;
        $this->charge = $charge;
        $this->discount = $discount;
        $this->orderItem = $orderItem;
        $this->shipping = $shipping;
        $this->config = $config;
        $this->jyuden = $jyuden;
        $this->options = $options;
    }

    public function getJyumei(): ?JyumeiModelInterface
    {
        return $this->jyumei;
    }

    public function getJyumeis(): array
    {
        return $this->jyumeis;
    }

    public function getCharge(): float
    {
        return $this->charge;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function getOrderItem(): OrderItem
    {
        return $this->orderItem;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function getJyuden(): JyudenModelInterface
    {
        return $this->jyuden;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
