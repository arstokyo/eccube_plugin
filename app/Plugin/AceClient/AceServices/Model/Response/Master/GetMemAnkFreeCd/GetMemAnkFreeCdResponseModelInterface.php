<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnkFreeCd;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetMemAnkFreeCd Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetMemAnkFreeCdResponseModelInterface extends ResponseModelInterface
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
