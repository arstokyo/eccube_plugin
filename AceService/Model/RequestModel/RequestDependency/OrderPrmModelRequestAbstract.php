<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\OrderPrmModelAbstract;

class OrderPrmModelRequestAbstract extends OrderPrmModelAbstract implements OrderPrmModelRequestInterface
{
    protected OrderModelRequestAbstract $order;

    /**
     * Set Order Model Request Abstract
     * 
     * @param OrderModelRequestAbstract
     */
    public function setOrder(OrderModelRequestInterface $order)
    {
        $this->order = $order;
    }
}