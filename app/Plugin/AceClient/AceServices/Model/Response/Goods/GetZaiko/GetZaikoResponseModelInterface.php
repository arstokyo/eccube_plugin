<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaiko;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetZaikoResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetZaikoResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MasterModel
     *
     * @return Response\Goods\GetZaiko\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MasterModel
     *
     * @param Response\Goods\GetZaiko\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}