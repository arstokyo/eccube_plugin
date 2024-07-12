<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetNyukaYoteiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetNyukaYoteiResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MasterModel
     *
     * @return Response\Goods\GetNyukaYotei\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set MasterModel
     *
     * @param Response\Goods\GetNyukaYotei\MasterModel $master
     */
    public function setMaster(MasterModel $master): void;
}