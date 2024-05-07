<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

/**
 * Member Service
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MemberService extends AceServiceAbstract implements AceServiceInterface
{

    protected string $baseServiceName = 'Member';

    /**
     * Make GetPointMethod
     * 
     * @return AceMethod\Member\GetPointMethod
     */
    public function makeGetPointMethod(): AceMethod\Member\GetPointMethod
    {
        return new AceMethod\Member\GetPointMethod($this->baseServiceName);
    }

    /**
     * Make RegmemAdrMethod
     * 
     * @return AceMethod\Member\RegMemAdrMethod
     */
    public function makeRegMemAdrMethod(): AceMethod\Member\RegMemAdrMethod
    {
        return new AceMethod\Member\RegMemAdrMethod($this->baseServiceName);
    }

}