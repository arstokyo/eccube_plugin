<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetGoodsManyResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsManyResponseModel extends ResponseModelAbtract implements GetGoodsManyResponseModelInterface
{
    /**
     * @var GoodsModelInterface $Goods
     */
    protected GoodsModelInterface $Goods;

    /**
     * {@inheritDoc}
     */
    public function getGoods(): GoodsModelInterface
    {
        return $this->Goods;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoods(GoodsModel $goods): void
    {
        $this->Goods = $goods;
    }
}