<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceMethod;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceServiceInterface;

/**
 * Member Service
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MemberService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Member';

    /**
     * Make GetPointMethod
     *
     * @deprecated Inject GetPointMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetPointMethod
     */
    public function makeGetPointMethod(): AceMethod\Member\GetPointMethod
    {
        return new AceMethod\Member\GetPointMethod($this->serviceRetriever);
    }

    /**
     * Make RegmemAdrMethod
     *
     * @deprecated Inject RegmemAdrMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\RegMemAdrMethod
     */
    public function makeRegMemAdrMethod(): AceMethod\Member\RegMemAdrMethod
    {
        return new AceMethod\Member\RegMemAdrMethod($this->serviceRetriever);
    }

    /**
     * Make CheckMailAdressMethod
     *
     * @deprecated Inject CheckMailAdressMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\CheckMailAdressMethod
     */
    public function makeCheckMailAdressMethod(): AceMethod\Member\CheckMailAdressMethod
    {
        return new AceMethod\Member\CheckMailAdressMethod($this->serviceRetriever);
    }

    /**
     * Make DeleteHaisoAdrsMethod
     *
     * @deprecated Inject DeleteHaisoAdrsMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\DeleteHaisoAdrsMethod
     */
    public function makeDeleteHaisoAdrsMethod(): AceMethod\Member\DeleteHaisoAdrsMethod
    {
        return new AceMethod\Member\DeleteHaisoAdrsMethod($this->serviceRetriever);
    }

    /**
     * Make GetHaisoAdrsMethod
     *
     * @deprecated Inject GetHaisoAdrsMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetHaisoAdrsMethod
     */
    public function makeGetHaisoAdrsMethod(): AceMethod\Member\GetHaisoAdrsMethod
    {
        return new AceMethod\Member\GetHaisoAdrsMethod($this->serviceRetriever);
    }

    /**
     * Make GetReminderMethod
     *
     * @deprecated Inject GetReminderMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetReminderMethod
     */
    public function makeGetReminderMethod(): AceMethod\Member\GetReminderMethod
    {
        return new AceMethod\Member\GetReminderMethod($this->serviceRetriever);
    }

    /**
     * Make GetMemberMethod
     *
     * @deprecated Inject GetMemberMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetMemberMethod
     */
    public function makeGetMemberMethod(): AceMethod\Member\GetMemberMethod
    {
        return new AceMethod\Member\GetMemberMethod($this->serviceRetriever);
    }

    /**
     * Make RegMemberMethod
     *
     * @deprecated Inject RegMemberMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\RegMemberMethod
     */
    public function makeRegMemberMethod(): AceMethod\Member\RegMemberMethod
    {
        return new AceMethod\Member\RegMemberMethod($this->serviceRetriever);
    }

    /**
     * Make GetRirekiMethod
     *
     * @deprecated Inject GetRirekiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetRirekiMethod
     */
    public function makeGetRirekiMethod(): AceMethod\Member\GetRirekiMethod
    {
        return new AceMethod\Member\GetRirekiMethod($this->serviceRetriever);
    }

    /**
     * Make GetRirekiDetailMethod
     *
     * @deprecated Inject GetRirekiDetailMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetRirekiDetailMethod
     */
    public function makeGetRirekiDetailMethod(): AceMethod\Member\GetRirekiDetailMethod
    {
        return new AceMethod\Member\GetRirekiDetailMethod($this->serviceRetriever);
    }

    /**
     * Make GetPasswordMethod
     *
     * @deprecated Inject GetPasswordMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetPasswordMethod
     */
    public function makeGetPasswordMethod(): AceMethod\Member\GetPasswordMethod
    {
        return new AceMethod\Member\GetPasswordMethod($this->serviceRetriever);
    }

    /**
     * Make RegMailMagazineMethod
     *
     * @deprecated Inject RegMailMagazineMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\RegMailMagazineMethod
     */
    public function makeRegMailMagazineMethod(): AceMethod\Member\RegMailMagazineMethod
    {
        return new AceMethod\Member\RegMailMagazineMethod($this->serviceRetriever);
    }

    /**
     * Make GetMemberNameMethod
     *
     * @deprecated Inject GetMemberNameMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetMemberNameMethod
     */
    public function makeGetMemberNameMethod(): AceMethod\Member\GetMemberNameMethod
    {
        return new AceMethod\Member\GetMemberNameMethod($this->serviceRetriever);
    }

    /**
     * Make UpdateTaikaiMethod
     *
     * @deprecated Inject UpdateTaikaiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\UpdateTaikaiMethod
     */
    public function makeUpdateTaikaiMethod(): AceMethod\Member\UpdateTaikaiMethod
    {
        return new AceMethod\Member\UpdateTaikaiMethod($this->serviceRetriever);
    }

    /**
     * Make GetMemberMcodeMethod
     *
     * @deprecated Inject GetMemberMcodeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetMemberMcodeMethod
     */
    public function makeGetMemberMcodeMethod(): AceMethod\Member\GetMemberMcodeMethod
    {
        return new AceMethod\Member\GetMemberMcodeMethod($this->serviceRetriever);
    }

    /**
     * Make RegMemwebEmailMethod
     *
     * @deprecated Inject RegMemwebEmailMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\RegMemwebEmailMethod
     */
    public function makeRegMemwebEmailMethod(): AceMethod\Member\RegMemwebEmailMethod
    {
        return new AceMethod\Member\RegMemwebEmailMethod($this->serviceRetriever);
    }

    /**
     * Make UpdatePasswordMethod
     *
     * @deprecated Inject UpdatePasswordMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\UpdatePasswordMethod
     */
    public function makeUpdatePasswordMethod(): AceMethod\Member\UpdatePasswordMethod
    {
        return new AceMethod\Member\UpdatePasswordMethod($this->serviceRetriever);
    }

    /**
     * Make GetPointRirekiMethod
     *
     * @deprecated Inject GetPointRirekiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetPointRirekiMethod
     */
    public function makeGetPointRirekiMethod(): AceMethod\Member\GetPointRirekiMethod
    {
        return new AceMethod\Member\GetPointRirekiMethod($this->serviceRetriever);
    }

    /**
     * Make GetSbpsCustIdMethod
     *
     * @deprecated Inject GetSbpsCustIdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetSbpsCustIdMethod
     */
    public function makeGetSbpsCustIdMethod(): AceMethod\Member\GetSbpsCustIdMethod
    {
        return new AceMethod\Member\GetSbpsCustIdMethod($this->serviceRetriever);
    }

    /**
     * Make UpdateSbpsCustIdMethod
     *
     * @deprecated Inject UpdateSbpsCustIdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\UpdateSbpsCustIdMethod
     */
    public function makeUpdateSbpsCustIdMethod(): AceMethod\Member\UpdateSbpsCustIdMethod
    {
        return new AceMethod\Member\UpdateSbpsCustIdMethod($this->serviceRetriever);
    }

    /**
     * Make DeleteSbpsCustIdMethod
     *
     * @deprecated Inject DeleteSbpsCustIdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\DeleteSbpsCustIdMethod
     */
    public function makeDeleteSbpsCustIdMethod(): AceMethod\Member\DeleteSbpsCustIdMethod
    {
        return new AceMethod\Member\DeleteSbpsCustIdMethod($this->serviceRetriever);
    }

    /**
     * Make CheckDuplicationMemberMethod
     *
     * @deprecated Inject CheckDuplicationMemberMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\CheckDuplicationMemberMethod
     */
    public function makeCheckDuplicationMemberMethod(): AceMethod\Member\CheckDuplicationMemberMethod
    {
        return new AceMethod\Member\CheckDuplicationMemberMethod($this->serviceRetriever);
    }

    /**
     * Make GetDurationOrderTotalMethod
     *
     * @deprecated Inject GetDurationOrderTotalMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Member\GetDurationOrderTotalMethod
     */
    public function makeGetDurationOrderTotalMethod(): AceMethod\Member\GetDurationOrderTotalMethod
    {
        return new AceMethod\Member\GetDurationOrderTotalMethod($this->serviceRetriever);
    }
}
