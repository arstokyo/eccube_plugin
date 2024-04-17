<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestAbstract;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

class OrderPrmModelAbstract extends OrderPrmModelRequestAbstract implements OrderPrmModelInterface
{

    /**
     * Set Order Model Abstract
     * 
     * @param Jyuden\Dependency\OrderModelAbstract $order
     */
    public function setOrder(OrderModelRequestInterface $order): void
    {
        $this->order = $order;
    }

}