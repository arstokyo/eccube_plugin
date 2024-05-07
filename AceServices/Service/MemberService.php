<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;
use Plugin\AceClient\AceServices\AceMethod\Member\GetPointMethod;

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
    public function makeGetPointMethod(): GetPointMethod
    {
        return new GetPointMethod($this->baseServiceName);
    }

}