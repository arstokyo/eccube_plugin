<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnkFreemst;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetMemAnkFreemstResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetMemAnkFreemstResponseModel extends ResponseModelAbtract implements GetMemAnkFreemstResponseModelInterface
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