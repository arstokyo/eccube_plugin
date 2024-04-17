<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestAbstract;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

class OrderPrmJyudenRequestModelAbstract extends OrderPrmModelRequestAbstract implements OrderPrmJyudenRequestModelInterface
{

    /**
     * Set Order Jyuden Request Model Abstract
     * 
     * @param OrderJyudenRequestModelAbstract $order
     */
    public function setOrder(OrderModelRequestInterface $order)
    {
        $this->order = $order;
    }

}