<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

interface OrderPrmModelInterface extends OrderPrmModelRequestInterface
{
    /**
     * Set Order Model Request Interface
     * 
     * @param Request\Jyuden\Dependency\OrderModelAbstract $order
     * @return Request\Jyuden\Dependency\OrderPrmModelInterface
     */
    public function setOrder(OrderModelRequestInterface $order): self;
}