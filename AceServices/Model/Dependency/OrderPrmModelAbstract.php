<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceClient\AceServices\Model;

abstract class  OrderPrmModelAbstract extends PrmModelAbstract implements OrderPrmModelInterface
{
    /** @var OrderModelInterface オーダー情報 */
    protected OrderModelInterface $order;

    /**
     * Get  オーダーモデル
     * 
     * @return Model\Dependency\OrderModelInterface
     */
    public function getOrder(): OrderModelInterface
    {
        return $this->order;
    }

}