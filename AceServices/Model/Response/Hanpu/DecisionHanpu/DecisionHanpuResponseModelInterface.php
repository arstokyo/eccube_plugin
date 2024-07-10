<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for DecisionHanpuResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DecisionHanpuResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get OrderModel
     *
     * @return Response\Hanpu\DecisionHanpu\OrderModelInterface
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set OrderModel
     *
     * @param Response\Hanpu\DecisionHanpu\OrderModel $order
     */
    public function setOrder(OrderModel $order): void;
}