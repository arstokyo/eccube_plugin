<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for Decision Cart Response Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface DecisionCartResponseModelInterface extends Response\ResponseModelInterface
{
 /**
     * Get order
     * 
     * @return Response\Jyuden\DecisionCart\OrderModel
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set order
     * 
     * @param Response\Jyuden\DecisionCart\OrderModel $order
     * @return void
     */
    public function setOrder(OrderModel $order): void;
}