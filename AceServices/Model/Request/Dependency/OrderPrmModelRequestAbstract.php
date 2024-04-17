<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\OrderPrmModelAbstract;

class OrderPrmModelRequestAbstract extends OrderPrmModelAbstract implements OrderPrmModelRequestInterface
{
    /**
     * Set Order Model Request Abstract
     * 
     * @param OrderModelRequestAbstract
     */
    public function setOrder(OrderModelRequestInterface $order): void
    {
        $this->order = $order;
    }
}