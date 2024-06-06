<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetPcode;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetPcode Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetPcodeResponseModelInterface extends ResponseModelInterface
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
