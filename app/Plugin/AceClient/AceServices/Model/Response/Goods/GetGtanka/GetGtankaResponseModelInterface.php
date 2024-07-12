<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGtanka;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetGtankaResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGtankaResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MasterModel
     *
     * @return Response\Goods\GetGtanka\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MasterModel
     *
     * @param Response\Goods\GetGtanka\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}