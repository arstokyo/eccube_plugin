<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 */

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\CreateOrder\CreateOrderResponseModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * 注文確定（DecisionCart）完了後のイベント
 *
 * 統合API（CreateOrder）のレスポンスを受け取ります。
 */
class PostCreateOrderEvent extends Event
{
    private CreateOrderResponseModelInterface $createOrderResponse;

    private Shipping $shipping;

    private array $options;

    public function __construct(
        CreateOrderResponseModelInterface $createOrderResponse,
        Shipping $shipping,
        array $options,
    ) {
        $this->createOrderResponse = $createOrderResponse;
        $this->shipping = $shipping;
        $this->options = $options;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    /**
     * 統合APIのレスポンスを返します。
     */
    public function getCreateOrderResponse(): CreateOrderResponseModelInterface
    {
        return $this->createOrderResponse;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
