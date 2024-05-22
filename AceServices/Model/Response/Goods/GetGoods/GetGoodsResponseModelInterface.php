<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for GetGoodsResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MemberModel
     *
     * @return Response\Goods\GetGoods\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MemberModel
     *
     * @param Response\Goods\GetGoods\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}