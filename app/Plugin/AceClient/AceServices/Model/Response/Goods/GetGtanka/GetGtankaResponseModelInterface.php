<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGtanka;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

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