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
        return new AceMethod\Member\GetPointMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make RegmemAdrMethod
     *
     * @return AceMethod\Member\RegMemAdrMethod
     */
    public function makeRegMemAdrMethod(): AceMethod\Member\RegMemAdrMethod
    {
        return new AceMethod\Member\RegMemAdrMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make CheckMailAdressMethod
     *
     * @return AceMethod\Member\CheckMailAdressMethod
     */
    public function makeCheckMailAdressMethod(): AceMethod\Member\CheckMailAdressMethod
    {
        return new AceMethod\Member\CheckMailAdressMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make DeleteHaisoAdrsMethod
     *
     * @return AceMethod\Member\DeleteHaisoAdrsMethod
     */
    public function makeDeleteHaisoAdrsMethod(): AceMethod\Member\DeleteHaisoAdrsMethod
    {
        return new AceMethod\Member\DeleteHaisoAdrsMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetHaisoAdrsMethod
     * 
     * @return AceMethod\Member\GetHaisoAdrsMethod
     */
    public function makeGetHaisoAdrsMethod(): AceMethod\Member\GetHaisoAdrsMethod
    {
        return new AceMethod\Member\GetHaisoAdrsMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetReminderMethod
     *
     * @return AceMethod\Member\GetReminderMethod
     */
    public function makeGetReminderMethod(): AceMethod\Member\GetReminderMethod
    {
        return new AceMethod\Member\GetReminderMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetMemberMethod
     *
     * @return AceMethod\Member\GetMemberMethod
     */
    public function makeGetMemberMethod(): AceMethod\Member\GetMemberMethod
    {
        return new AceMethod\Member\GetMemberMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make RegMemberMethod
     *
     * @return AceMethod\Member\RegMemberMethod
     */
    public function makeRegMemberMethod(): AceMethod\Member\RegMemberMethod
    {
        return new AceMethod\Member\RegMemberMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetRirekiMethod
     *
     * @return AceMethod\Member\GetRirekiMethod
     */
    public function makeGetRirekiMethod(): AceMethod\Member\GetRirekiMethod
    {
        return new AceMethod\Member\GetRirekiMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetRirekiDetailMethod
     *
     * @return AceMethod\Member\GetRirekiDetailMethod
     */
    public function makeGetRirekiDetailMethod(): AceMethod\Member\GetRirekiDetailMethod
    {
        return new AceMethod\Member\GetRirekiDetailMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetPasswordMethod
     *
     * @return AceMethod\Member\GetPasswordMethod
     */
    public function makeGetPasswordMethod(): AceMethod\Member\GetPasswordMethod
    {
        return new AceMethod\Member\GetPasswordMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make RegMailMagazineMethod
     *
     * @return AceMethod\Member\RegMailMagazineMethod
     */
    public function makeRegMailMagazineMethod(): AceMethod\Member\RegMailMagazineMethod
    {
        return new AceMethod\Member\RegMailMagazineMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetMemberNameMethod
     *
     * @return AceMethod\Member\GetMemberNameMethod
     */
    public function makeGetMemberNameMethod(): AceMethod\Member\GetMemberNameMethod
    {
        return new AceMethod\Member\GetMemberNameMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make UpdateTaikaiMethod
     *
     * @return AceMethod\Member\UpdateTaikaiMethod
     */
    public function makeUpdateTaikaiMethod(): AceMethod\Member\UpdateTaikaiMethod
    {
        return new AceMethod\Member\UpdateTaikaiMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetMemberMcodeMethod
     *
     * @return AceMethod\Member\GetMemberMcodeMethod
     */
    public function makeGetMemberMcodeMethod(): AceMethod\Member\GetMemberMcodeMethod
    {
        return new AceMethod\Member\GetMemberMcodeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make RegMemwebEmailMethod
     *
     * @return AceMethod\Member\RegMemwebEmailMethod
     */
    public function makeRegMemwebEmailMethod(): AceMethod\Member\RegMemwebEmailMethod
    {
        return new AceMethod\Member\RegMemwebEmailMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make UpdatePasswordMethod
     *
     * @return AceMethod\Member\UpdatePasswordMethod
     */
    public function makeUpdatePasswordMethod(): AceMethod\Member\UpdatePasswordMethod
    {
        return new AceMethod\Member\UpdatePasswordMethod($this->baseServiceName, $this->serviceRetriever);
    }
}