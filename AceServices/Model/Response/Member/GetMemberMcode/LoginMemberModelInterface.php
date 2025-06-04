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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder;

/**
 * Interface for Login Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface LoginMemberModelInterface extends HasMessageModelExtend1Interface
{
    /**
     * Get Member
     *
     * @return MemberModel|null
     */
    public function getMember(): ?MemberModel;

    /**
     * Set Member
     *
     * @param MemberModel|null $member
     *
     * @return void
     */
    public function setMember(?MemberModel $member): void;

    /**
     * Get Reminder
     *
     * @return Reminder\ReminderModel|null
     */
    public function getReminder(): ?Reminder\ReminderModel;

    /**
     * Set Reminder
     *
     * @param Reminder\ReminderModel|null $reminder
     *
     * @return void
     */
    public function setReminder(?Reminder\ReminderModel $reminder): void;

    /**
     * Get STPoint
     *
     * @return Point\STPointModel|null
     */
    public function getSTPoint(): ?Point\STPointModel;

    /**
     * Set STPoint
     *
     * @param Point\STPointModel|null $stpoint
     *
     * @return void
     */
    public function setSTPoint(?Point\STPointModel $stpoint): void;

    /**
     * Get OrderInfo
     *
     * @return OrderInfoModel|null
     */
    public function getOrderInfo(): ?OrderInfoModel;

    /**
     * Set OrderInfo
     *
     * @param OrderInfoModel|null $orderInfo
     *
     * @return void
     */
    public function setOrderInfo(?OrderInfoModel $orderInfo): void;
}
