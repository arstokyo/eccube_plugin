<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class AddHanpuResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class AddHanpuResponseModel extends ResponseModelAbtract implements AddHanpuResponseModelInterface
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