<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

interface OrderPrmModelInterface extends OrderPrmModelRequestInterface
{
    /**
     * Set Order Model Request Interface
     * 
     * @param Jyuden\Dependency\OrderModelAbstract $order
     * @return Jyuden\Dependency\OrderPrmModelInterface
     */
    public function setOrder(OrderModelRequestInterface $order): self;
}