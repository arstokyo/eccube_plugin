<?php

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceServiceInterface;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceMethod;

/**
 * Contact Service
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class ContactService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Contact';

    /**
     * Make RegContactMethod
     *
     * @return AceMethod\Contact\RegContactMethod
     */
    public function makeRegContactMethod(): AceMethod\Contact\RegContactMethod
    {
        return new AceMethod\Contact\RegContactMethod($this->baseServiceName, $this->serviceRetriever);
    }
}