<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreemst;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetBumonFreemst Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetBumonFreemstResponseModelInterface extends ResponseModelInterface
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
