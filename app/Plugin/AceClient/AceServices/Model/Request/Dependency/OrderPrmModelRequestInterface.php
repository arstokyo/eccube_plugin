<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\OrderPrmModelInterface;

interface OrderPrmModelRequestInterface extends OrderPrmModelInterface
{
    /**
     * Set Order Model Request Interface
     * 
     * @param Request\Dependency\OrderModelRequestInterface $order
     * @return Request\Dependency\OrderPrmModelRequestInterface
     */
    public function setOrder(OrderModelRequestInterface $order): self;

    /**
     * Get  オーダーモデル
     * 
     * @return Request\Dependency\OrderModelRequestInterface
     */
    public function getOrder(): OrderModelRequestInterface;
}