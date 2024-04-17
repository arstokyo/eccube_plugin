<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Dependency\OrderPrmModelRequestAbstract;
use Plugin\AceClient\AceService\Model\Request\Dependency\OrderModelRequestInterface;

class OrderPrmJyudenRequestModelAbstract extends OrderPrmModelRequestAbstract implements OrderPrmJyudenRequestModelInterface
{

    /** @var OrderJyudenRequestModelAbstract オーダー情報 */
    protected OrderJyudenRequestModelAbstract $order;

    /**
     * Set Order Jyuden Request Model Abstract
     * 
     * @param OrderJyudenRequestModelAbstract $order
     */
    public function setOrder(OrderModelRequestInterface $order)
    {
        $this->order = $order;
    }

}