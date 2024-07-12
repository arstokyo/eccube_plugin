<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreeMemo;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetBumonFreeMemo Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetBumonFreeMemoResponseModelInterface extends ResponseModelInterface
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
