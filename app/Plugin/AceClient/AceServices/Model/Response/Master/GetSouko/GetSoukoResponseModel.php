<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetSouko;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetSoukoResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetSoukoResponseModel extends ResponseModelAbtract implements GetSoukoResponseModelInterface
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