<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFreeCd;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetGoodsFreeCd Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetGoodsFreeCdResponseModelInterface extends ResponseModelInterface
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
