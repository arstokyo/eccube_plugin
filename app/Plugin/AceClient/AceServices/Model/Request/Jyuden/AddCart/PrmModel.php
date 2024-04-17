<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderPrmModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelInterface;

class PrmModel extends OrderPrmModelAbstract implements OrderPrmModelInterface
{

    /**
     * Set Order Model
     * 
     * @param Jyuden\Dependency\OrderModelInterface $order
     * @return Jyuden\AddCart\PrmModel
     */
    public function setOrder(OrderModelRequestInterface $order): self
    {
        $this->order = $order;
        return $this;
    }

}