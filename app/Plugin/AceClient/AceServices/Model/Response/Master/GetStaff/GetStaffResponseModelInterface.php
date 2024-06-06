<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetStaff;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetStaff Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetStaffResponseModelInterface extends ResponseModelInterface
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
