<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\CreateOrder;

use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart\OrderModelInterface;

/**
 * Create Order Response Model - Based on DecisionCart response with enhanced error messages
 */
class CreateOrderResponseModel extends Response\ResponseModelAbtract implements CreateOrderResponseModelInterface
{
    /** @var ?OrderModelInterface */
    protected ?OrderModelInterface $order = null;

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
    public function setOrder(OrderModelInterface $order): self
    {
        $this->order = $order;

        return $this;
    }
}
