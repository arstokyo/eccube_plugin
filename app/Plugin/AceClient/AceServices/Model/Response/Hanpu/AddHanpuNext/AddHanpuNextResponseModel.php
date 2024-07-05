<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class AddHanpuNextResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class AddHanpuNextResponseModel extends ResponseModelAbtract implements AddHanpuNextResponseModelInterface
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