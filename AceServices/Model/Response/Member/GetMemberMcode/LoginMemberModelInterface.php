<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

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
     * @return void
     */
    public function setOrderInfo(?OrderInfoModel $orderInfo): void;
}