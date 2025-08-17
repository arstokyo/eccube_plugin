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

    /**
     * Get AddCart processing message 1
     *
     * @return string|null
     */
    public function getAddCartMessage1(): ?string;

    /**
     * Set AddCart processing message 1
     *
     * @param string|null $addCartMessage1
     *
     * @return self
     */
    public function setAddCartMessage1(?string $addCartMessage1): self;

    /**
     * Get AddCart processing message 2
     *
     * @return string|null
     */
    public function getAddCartMessage2(): ?string;

    /**
     * Set AddCart processing message 2
     *
     * @param string|null $addCartMessage2
     *
     * @return self
     */
    public function setAddCartMessage2(?string $addCartMessage2): self;

    /**
     * Get DecisionCart processing message 1
     *
     * @return string|null
     */
    public function getDecisionCartMessage1(): ?string;

    /**
     * Set DecisionCart processing message 1
     *
     * @param string|null $decisionCartMessage1
     *
     * @return self
     */
    public function setDecisionCartMessage1(?string $decisionCartMessage1): self;

    /**
     * Get DecisionCart processing message 2
     *
     * @return string|null
     */
    public function getDecisionCartMessage2(): ?string;

    /**
     * Set DecisionCart processing message 2
     *
     * @param string|null $decisionCartMessage2
     *
     * @return self
     */
    public function setDecisionCartMessage2(?string $decisionCartMessage2): self;
}
