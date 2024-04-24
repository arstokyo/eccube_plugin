<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Plugin\AceClient\AceServices\Model\Response\Depedency\OrderModelResponseAbstract;

class AddCartResponseModel extends ResponseModelAbtract
{
    /**
     * Order
     * 
     * @var OrderModelResponseAbstract $order
     */
    protected OrderModelResponseAbstract $order;

    /**
     * Get order
     * 
     * @return OrderModelResponseAbstract
     */
    public function getOrder(): OrderModelResponseAbstract
    {
        return $this->order;
    }

    /**
     * Set order
     * 
     * @param OrderModelResponseAbstract $order
     * @return void
     */
    public function setOrder(OrderModelResponseAbstract $order): void
    {
        $this->order = $order;
    }
}