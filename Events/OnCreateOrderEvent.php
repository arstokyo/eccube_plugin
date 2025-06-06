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
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\DecisionCartRequestModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class OnCreateOrderEvent extends Event
{
    private DecisionCartRequestModelInterface $decisionCartRequest;
    private Shipping $shipping;
    private array $options;

    public function __construct(
        DecisionCartRequestModelInterface $decisionCartRequest,
        Shipping $shipping,
        array $options,
    ) {
        $this->decisionCartRequest = $decisionCartRequest;
        $this->shipping = $shipping;
        $this->options = $options;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getDecisionCartRequest(): DecisionCartRequestModelInterface
    {
        return $this->decisionCartRequest;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
