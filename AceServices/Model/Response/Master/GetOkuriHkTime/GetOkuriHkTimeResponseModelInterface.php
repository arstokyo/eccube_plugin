<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for getOkuriHkTime Response Model
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface GetOkuriHkTimeResponseModelInterface extends ResponseModelInterface 
{

    /**
     * Get Master Model
     * 
     * @return Response\Master\GetOkuriHkTime\MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set Master Model
     * 
     * @param Response\Master\GetOkuriHkTime\MasterModel $master
     * @return void
     */
    public function setMaster(MasterModel $master): void;

}