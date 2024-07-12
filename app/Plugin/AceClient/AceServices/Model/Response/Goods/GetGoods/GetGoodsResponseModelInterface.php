<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetGoodsResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MasterModel
     *
     * @return Response\Goods\GetGoods\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MasterModel
     *
     * @param Response\Goods\GetGoods\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}