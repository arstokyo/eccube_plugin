<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\OrderPrmModelInterface;

interface OrderPrmModelRequestInterface extends OrderPrmModelInterface
{
    /**
     * Get Order Model Request Interface
     * 
     * @return OrderModelRequestInterface
     */
    public function getOrder(): OrderModelRequestInterface;
}