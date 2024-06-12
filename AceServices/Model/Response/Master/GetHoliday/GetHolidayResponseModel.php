<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetHolidayResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetHolidayResponseModel extends ResponseModelAbtract implements GetHolidayResponseModelInterface
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