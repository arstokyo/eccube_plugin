<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Dependency\OrderModelRequestInterface;

class OrderPrmJyudenRequestModelForAddCart extends OrderPrmJyudenRequestModelAbstract implements OrderPrmJyudenRequestModelInterface
{

    /** @var OrderJyudenRequestModelForAddCart オーダー情報 */
    protected OrderJyudenRequestModelForAddCart $order;

    /**
     * Set Order Jyuden Request Model For AddCart
     * 
     * @param OrderJyudenRequestModelForAddCart $order
     */
    public function setOrder(OrderModelRequestInterface $order)
    {
        return $this->order;
    }

}