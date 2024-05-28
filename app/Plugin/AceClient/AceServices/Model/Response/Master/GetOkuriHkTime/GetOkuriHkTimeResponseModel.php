<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * 
 */


class GetOkuriHkTimeResponseModel extends ResponseModelAbtract implements GetOkuriHkTimeResponseModelInterface
{
    /**
     * @var MasterModelInterface $master
     */
    protected MasterModelInterface $master;


    /**
     * {@inheritDoc}
     */
    public function getMaster(): MasterModelInterface
    {
        return $this->master;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaster(MasterModel $master): void
    {
        $this->master = $master;
    }
}