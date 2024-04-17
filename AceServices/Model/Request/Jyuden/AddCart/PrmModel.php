<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelInterface;

class PrmModel extends OrderPrmModelAbstract implements OrderPrmModelInterface
{

    /**
     * Set Order Model
     * 
     * @param Jyuden\AddCart\OrderModel $order
     */
    public function setOrder(OrderModelRequestInterface $order): void
    {
        $this->order = $order;
    }

}