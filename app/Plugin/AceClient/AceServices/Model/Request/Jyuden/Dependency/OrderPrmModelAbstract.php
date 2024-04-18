<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestAbstract;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

abstract class OrderPrmModelAbstract extends OrderPrmModelRequestAbstract implements OrderPrmModelInterface
{

    /**
     * Set Order Model Abstract
     * 
     * @param Request\Jyuden\Dependency\OrderModelAbstract $order
     * @return Request\Jyuden\Dependency\OrderPrmModelAbstract
     */
    public function setOrder(OrderModelRequestInterface $order): self
    {
        $this->order = $order;
        return $this;
    }

}