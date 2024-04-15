<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use PhpParser\Node\Stmt\Interface_;
use Plugin\AceClient\AceService\Model\Request\Dependency\OrderPrmModelRequestInterface;

interface OrderPrmJyudenRequestModelInterface extends OrderPrmModelRequestInterface
{
     /**
     * Get Order Jyuden Request Model Interface
     * 
     * @return OrderJyudenRequestModelInterface
     */
    public function getOrder(): OrderJyudenRequestModelInterface;
}