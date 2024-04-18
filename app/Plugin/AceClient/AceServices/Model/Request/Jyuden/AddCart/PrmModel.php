<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelInterface;

class PrmModel extends OrderPrmModelAbstract implements OrderPrmModelInterface
{

    /**
     * Set Order Model
     * 
     * @param Request\Jyuden\AddCart\OrderModel $order
     * @return Request\Jyuden\AddCart\PrmModel
     */
    public function setOrder(OrderModelRequestInterface $order): self
    {
        $this->order = $order;
        return $this;
    }

    protected function xmlNodeName(): string
    {
        return 'order';
    }

}