<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\OrderPrmModelAbstract;

class OrderPrmModelRequestAbstract extends OrderPrmModelAbstract implements OrderPrmModelRequestInterface
{
    /**
     * Set Order Model Request Abstract
     * 
     * @param Request\Dependency\OrderModelRequestAbstract $order
     * @return Request\Dependency\OrderPrmModelRequestAbstract
     */
    public function setOrder(OrderModelRequestInterface $order): self
    {
        $this->order = $order;
        return $this;
    }

        /**
     * Get  オーダーモデル
     * 
     * @return Request\Dependency\OrderModelRequestInterface
     */
    public function getOrder(): OrderModelRequestInterface
    {
        return $this->order;
    }
}