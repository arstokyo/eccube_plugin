<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetGoodsBunruiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsBunruiResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MasterModel
     *
     * @return Response\Goods\GetGoodsBunrui\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MasterModel
     *
     * @param Response\Goods\GetGoodsBunrui\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}