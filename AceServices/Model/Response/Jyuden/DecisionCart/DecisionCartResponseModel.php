<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient\AceServices\Model\Response;

/**
 * Model for Decision Cart Response
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DecisionCartResponseModel extends Response\ResponseModelAbtract implements DecisionCartResponseModelInterface
{

    /** @var  OrderModelInterface $order*/
    private OrderModelInterface $order;

    /**
     * {@inheritDoc} 
    */
    public function getOrder(): OrderModelInterface
    {
        return $this->order;
    }

    /**
     * {@inheritDoc} 
    */
    public function setOrder(OrderModel $order): void
    {
        $this->order = $order;
    }
    
}