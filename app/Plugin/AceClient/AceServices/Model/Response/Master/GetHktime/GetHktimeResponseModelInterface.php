<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetHktime;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetHktime Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetHktimeResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Master
    *
    * @return MasterModel
    */
    public function getMaster():MasterModel;
    /**
    * Set Master
    *
    * @return void
    */
    public function setMaster(MasterModel $master): void;
}
