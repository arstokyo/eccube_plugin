<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetZaikoAll;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for GetZaikoAllResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetZaikoAllResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MasterModel
     *
     * @return Response\Goods\GetZaikoAll\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MasterModel
     *
     * @param Response\Goods\GetZaikoAll\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}