<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\OrderPrmModelInterface;

interface OrderPrmModelRequestInterface extends OrderPrmModelInterface
{
    /**
     * Set Order Model Request Interface
     * 
     * @param OrderModelRequestInterface $order
     */
    public function setOrder(OrderModelRequestInterface $order);
}