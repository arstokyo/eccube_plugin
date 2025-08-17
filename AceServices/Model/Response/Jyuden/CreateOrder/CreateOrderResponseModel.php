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
    private ?OrderModelInterface $order = null;

    /** @var ?string AddCart processing message */
    private ?string $addCartMessage1 = null;

    /** @var ?string AddCart processing message */
    private ?string $addCartMessage2 = null;

    /** @var ?string DecisionCart processing message */
    private ?string $decisionCartMessage1 = null;

    /** @var ?string DecisionCart processing message */
    private ?string $decisionCartMessage2 = null;

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

    /**
     * {@inheritDoc}
     */
    public function getAddCartMessage1(): ?string
    {
        return $this->addCartMessage1;
    }

    /**
     * {@inheritDoc}
     */
    public function setAddCartMessage1(?string $addCartMessage1): self
    {
        $this->addCartMessage1 = $addCartMessage1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddCartMessage2(): ?string
    {
        return $this->addCartMessage2;
    }

    /**
     * {@inheritDoc}
     */
    public function setAddCartMessage2(?string $addCartMessage2): self
    {
        $this->addCartMessage2 = $addCartMessage2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDecisionCartMessage1(): ?string
    {
        return $this->decisionCartMessage1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDecisionCartMessage1(?string $decisionCartMessage1): self
    {
        $this->decisionCartMessage1 = $decisionCartMessage1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDecisionCartMessage2(): ?string
    {
        return $this->decisionCartMessage2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDecisionCartMessage2(?string $decisionCartMessage2): self
    {
        $this->decisionCartMessage2 = $decisionCartMessage2;

        return $this;
    }
}
