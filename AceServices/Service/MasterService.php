<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

/**
 * Master Service
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

class MasterService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Master';

    /**
     * Meke Get OkuriHkTime Method
     * 
     * @return AceMethod\Master\GetOkuriHkTimeMethod
     */
    public function makeGetOkuriHkTimeMethod(): AceMethod\Master\GetOkuriHkTimeMethod
    {
        return new AceMethod\Master\GetOkuriHkTimeMethod($this->baseServiceName, $this->serviceRetriever);
    }
}