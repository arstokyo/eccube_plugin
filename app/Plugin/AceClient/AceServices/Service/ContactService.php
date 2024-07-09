<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

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