<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Dependency\OrderPrmModelRequestAbstract;

class OrderPrmJyudenRequestModelAbstract extends OrderPrmModelRequestAbstract implements OrderPrmJyudenRequestModelInterface
{

    /** @var OrderJyudenRequestModelAbstract オーダー情報 */
    protected OrderJyudenRequestModelAbstract $order;

    /**
     * Get Order Jyuden Request Model Abstract
     * 
     * @return OrderJyudenRequestModelAbstract
     */
    public function getOrder(): OrderJyudenRequestModelAbstract
    {
        return $this->order;
    }

}