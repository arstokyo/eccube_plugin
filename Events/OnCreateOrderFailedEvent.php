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

use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\CreateOrder\CreateOrderResponseModelInterface;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Symfony\Contracts\EventDispatcher\Event;

class OnCreateOrderFailedEvent extends Event
{
    private \Throwable $exception;
    private Shipping $shipping;
    private CreateOrderRequestModelInterface $request;
    private CreateOrderResponseModelInterface $response;
    private array $options;

    public function __construct(
        \Throwable $exception,
        Shipping $shipping,
        ?CreateOrderRequestModelInterface $request,
        ?CreateOrderResponseModelInterface $response,
        array $options,
    ) {
        $this->exception = $exception;
        $this->request = $request;
        $this->response = $response;
        $this->shipping = $shipping;
        $this->options = $options;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getRequest(): ?CreateOrderRequestModelInterface
    {
        return $this->request;
    }

    public function getResponse(): ?CreateOrderResponseModelInterface
    {
        return $this->response;
    }

    public function getException(): \Throwable
    {
        return $this->exception;
    }

    public function getOrder(): Order
    {
        return $this->shipping->getOrder();
    }

    public function isCouldNotCreateOrderException(): bool
    {
        return $this->exception instanceof CouldNotCreateOrderException;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
