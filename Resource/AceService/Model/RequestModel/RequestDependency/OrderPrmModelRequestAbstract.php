<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\OrderPrmModelAbstract;

class OrderPrmModelRequestAbstract extends OrderPrmModelAbstract implements OrderPrmModelRequestInterface
{
    protected OrderModelRequestAbstract $order;

    public function getOrder(): OrderModelRequestAbstract
    {
        return $this->order;
    }
}