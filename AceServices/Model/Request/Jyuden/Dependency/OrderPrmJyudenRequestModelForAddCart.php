<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

class OrderPrmJyudenRequestModelForAddCart extends OrderPrmJyudenRequestModelAbstract implements OrderPrmJyudenRequestModelInterface
{

    /**
     * Set Order Jyuden Request Model For AddCart
     * 
     * @param OrderJyudenRequestModelForAddCart $order
     */
    public function setOrder(OrderModelRequestInterface $order)
    {
        return $this->order;
    }

}