<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

class OrderPrmJyudenRequestModelForAddCart extends OrderPrmJyudenRequestModelAbstract implements OrderPrmJyudenRequestModelInterface
{

    /** @var OrderJyudenRequestModelForAddCart オーダー情報 */
    protected OrderJyudenRequestModelForAddCart $order;

    /**
     * Get Order Jyuden Request Model For AddCart
     * 
     * @return OrderJyudenRequestModelForAddCart
     */
    public function getOrder(): OrderJyudenRequestModelForAddCart
    {
        return $this->order;
    }

}