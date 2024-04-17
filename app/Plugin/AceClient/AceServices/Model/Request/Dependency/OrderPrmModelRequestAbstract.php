<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\OrderPrmModelAbstract;

class OrderPrmModelRequestAbstract extends OrderPrmModelAbstract implements OrderPrmModelRequestInterface
{
    /**
     * Set Order Model Request Abstract
     * 
     * @param OrderModelRequestAbstract $order
     * @return OrderPrmModelRequestAbstract
     */
    public function setOrder(OrderModelRequestInterface $order): self
    {
        $this->order = $order;
        return $this;
    }
}