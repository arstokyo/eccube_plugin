<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for AddHanpuNextResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface AddHanpuNextResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get OrderModel
     *
     * @return Response\Hanpu\AddHanpuNext\OrderModelInterface
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set OrderModel
     *
     * @param Response\Hanpu\AddHanpuNext\OrderModel $order
     */
    public function setOrder(OrderModel $order): void;
}