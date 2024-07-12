<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

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