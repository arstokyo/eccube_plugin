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
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart\DecisionCartResponseModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PostCreateOrderEvent extends Event
{
    private DecisionCartResponseModelInterface $decisionCartResponse;
    private Shipping $shipping;
    private array $options;

    public function __construct(
        DecisionCartResponseModelInterface $decisionCartResponse,
        Shipping $shipping,
        array $options,
    ) {
        $this->decisionCartResponse = $decisionCartResponse;
        $this->shipping = $shipping;
        $this->options = $options;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getDecisionCartResponse(): DecisionCartResponseModelInterface
    {
        return $this->decisionCartResponse;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
