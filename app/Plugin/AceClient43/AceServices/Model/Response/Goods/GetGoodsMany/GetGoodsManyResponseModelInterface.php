<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetGoodsManyResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsManyResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get GoodsModel
     *
     * @return Response\Goods\GetGoodsMany\GoodsModelInterface
     */
    public function getGoods(): GoodsModelInterface;

    /**
     * Set GoodsModel
     *
     * @param Response\Goods\GetGoodsMany\GoodsModel $goods
     */
    public function setGoods(GoodsModel $goods): void;
}