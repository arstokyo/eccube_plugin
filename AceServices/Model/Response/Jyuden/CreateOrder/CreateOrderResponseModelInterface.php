<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\CreateOrder;

use Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart\OrderModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for Create Order Response Model
 */
interface CreateOrderResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Order information (DecisionCart result)
     *
     * @return OrderModelInterface
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set Order information (DecisionCart result)
     *
     * @param OrderModelInterface $order
     *
     * @return self
     */
    public function setOrder(OrderModelInterface $order): self;
}
