<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for Okuri Hk Time Request Model
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */


interface GetOkuriHkTimeResponseModelInterface extends ResponseModelInterface 
{
    /**
     * Get list Master
     * 
     * @return GetOkuriHkTime\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set list Master
     * 
     * @param GetOkuriHkTime\MasterModel $master
     * @return void
     */
    public function setMaster(MasterModel $master): void;
}