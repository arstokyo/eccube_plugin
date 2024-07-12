<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFreemst;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetGoodsFreemstResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetGoodsFreemstResponseModel extends ResponseModelAbtract implements GetGoodsFreemstResponseModelInterface
{
    /**
     * Master
     *
     * @var MasterModel $master
     */
    protected MasterModel $master;

    /**
     * @return MasterModel
     */
    function getMaster(): MasterModel
    {
        return $this->master;
    }

    /**
    * @param MasterModel $master
    */
    function setMaster(MasterModel $master): void
    {
        $this->master = $master;
    }
}