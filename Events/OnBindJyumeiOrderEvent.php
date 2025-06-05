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

    public function __construct(
        ?JyumeiModelInterface $jyumei,
        array $jyumeis,
        float $charge,
        float $discount,
        OrderItem $orderItem,
        Shipping $shipping,
        Config $config,
        JyudenModelInterface $jyuden,
    ) {
        $this->jyumei = $jyumei;
        $this->jyumeis = $jyumeis;
        $this->charge = $charge;
        $this->discount = $discount;
        $this->orderItem = $orderItem;
        $this->shipping = $shipping;
        $this->config = $config;
        $this->jyuden = $jyuden;
    }

    public function getJyumei(): ?JyumeiModelInterface
    {
        return $this->jyumei;
    }

    public function setJyumei(JyumeiModelInterface $jyumei): self
    {
        $this->jyumei = $jyumei;

        return $this;
    }

    public function getJyumeis(): array
    {
        return $this->jyumeis;
    }

    public function setJyumeis(array $jyumeis): self
    {
        $this->jyumeis = $jyumeis;

        return $this;
    }

    public function getCharge(): float
    {
        return $this->charge;
    }

    public function setCharge(float $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getOrderItem(): OrderItem
    {
        return $this->orderItem;
    }

    public function setOrderItem(OrderItem $orderItem): self
    {
        $this->orderItem = $orderItem;

        return $this;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function setShipping(Shipping $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function setConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getJyuden(): JyudenModelInterface
    {
        return $this->jyuden;
    }

    public function setJyuden(JyudenModelInterface $jyuden): self
    {
        $this->jyuden = $jyuden;

        return $this;
    }
}
