<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

interface OrderPrmJyudenRequestModelInterface extends OrderPrmModelRequestInterface
{
    /**
     * Set Order Model Request Interface
     * 
     * @param OrderJyudenRequestModelInterface $order
     */
    public function setOrder(OrderModelRequestInterface $order);
}