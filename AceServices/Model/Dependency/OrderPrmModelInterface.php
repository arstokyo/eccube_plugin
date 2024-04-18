<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceClient\AceServices\Model;

interface OrderPrmModelInterface extends PrmModelInterface
{
    /**
     * Get  オーダーモデル
     * 
     * @return Model\Dependency\OrderModelInterface
     */
    public function getOrder(): OrderModelInterface;

}