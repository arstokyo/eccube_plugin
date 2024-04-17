<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\OrderPrmModelInterface;

interface OrderPrmModelRequestInterface extends OrderPrmModelInterface
{
    /**
     * Set Order Model Request Interface
     * 
     * @param OrderModelRequestInterface $order
     */
    public function setOrder(OrderModelRequestInterface $order);
}