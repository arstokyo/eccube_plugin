<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

/**
 * Master2 Service
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class Master2Service extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Master2';

    /**
     * Make GetHaisouDayMethod
     *
     * @return AceMethod\Master2\GetHaisouDayMethod
     */
    public function makeGetHaisouDayMethod(): AceMethod\Master2\GetHaisouDayMethod
    {
        return new AceMethod\Master2\GetHaisouDayMethod($this->baseServiceName, $this->serviceRetriever);
    }
 
}