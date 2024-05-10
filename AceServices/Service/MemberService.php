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

    /**
     * Make CheckMailAdressMethod
     *
     * @return AceMethod\Member\CheckMailAdressMethod
     */
    public function makeCheckMailAdressMethod(): AceMethod\Member\CheckMailAdressMethod
    {
        return new AceMethod\Member\CheckMailAdressMethod($this->baseServiceName);
    }

    /**
     * Make DeleteHaisoAdrsMethod
     *
     * @return AceMethod\Member\DeleteHaisoAdrsMethod
     */
    public function makeDeleteHaisoAdrsMethod(): AceMethod\Member\DeleteHaisoAdrsMethod
    {
        return new AceMethod\Member\DeleteHaisoAdrsMethod($this->baseServiceName);
    }

    /**
     * Make GetHaisoAdrsMethod
     * 
     * @return AceMethod\Member\GetHaisoAdrsMethod
     */
    public function makeGetHaisoAdrsMethod(): AceMethod\Member\GetHaisoAdrsMethod
    {
        return new AceMethod\Member\GetHaisoAdrsMethod($this->baseServiceName);
    }

    /**
     * Make GetReminderMethod
     *
     * @return AceMethod\Member\GetReminderMethod
     */
    public function makeGetReminderMethod(): AceMethod\Member\GetReminderMethod
    {
        return new AceMethod\Member\GetReminderMethod($this->baseServiceName);
    }
}