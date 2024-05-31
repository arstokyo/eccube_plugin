<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for AddCartResponseModel.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AddCartResponseModelInterface extends Response\ResponseModelInterface
{

    /**
     * Get order
     * 
     * @return Response\Jyuden\AddCart\OrderModel
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set order
     * 
     * @param Response\Jyuden\AddCart\OrderModel $order
     * @return void
     */
    public function setOrder(OrderModel $order): void;
}