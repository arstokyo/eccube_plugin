<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Plugin\AceClient\AceServices\Model\Response\Depedency\OrderModelResponseAbstract;

/**
 * Model for AddCartResponse.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AddCartResponseModel extends ResponseModelAbtract implements AddCartResponseModelInterface
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