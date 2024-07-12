<?php

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceServiceInterface;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceMethod;

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

    /**
     * Make GetHaisouDayTimeMethod
     *
     * @return AceMethod\Master2\GetHaisouDayTimeMethod
     */
    public function makeGetHaisouDayTimeMethod(): AceMethod\Master2\GetHaisouDayTimeMethod
    {
        return new AceMethod\Master2\GetHaisouDayTimeMethod($this->baseServiceName, $this->serviceRetriever);
    }
}