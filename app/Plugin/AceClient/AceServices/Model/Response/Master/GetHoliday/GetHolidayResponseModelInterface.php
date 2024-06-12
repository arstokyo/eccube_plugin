<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetHoliday Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetHolidayResponseModelInterface extends ResponseModelInterface
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
