<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class DecisionHanpuResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DecisionHanpuResponseModel extends ResponseModelAbtract implements DecisionHanpuResponseModelInterface
{
    /**
     * @var OrderModelInterface $order
     */
    protected OrderModelInterface $order;

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
    public function setOrder(OrderModel $order): void
    {
        $this->order = $order;
    }
}