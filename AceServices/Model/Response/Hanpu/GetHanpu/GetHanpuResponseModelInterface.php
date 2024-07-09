<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpu;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for GetHanpuResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHanpuResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get OrderModel
     *
     * @return Response\Hanpu\AddHanpu\OrderModelInterface
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set OrderModel
     *
     * @param Response\Hanpu\AddHanpu\OrderModel $order
     */
    public function setOrder(OrderModel $order): void;
}