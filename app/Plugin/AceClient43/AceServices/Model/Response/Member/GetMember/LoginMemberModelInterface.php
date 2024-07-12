<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model;

/**
 * Interface for Login Member Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface LoginMemberModelInterface extends HasMessageModelExtend1Interface
{
    /**
     * Get Member
     *
     * @return Response\Member\GetMember\MemberModel|null
     */
    public function getMember(): ?MemberModelInterface;

    /**
     * Set Member
     *
     * @param Response\Member\GetMember\MemberModel|null $member
     * @return void
     */
    public function setMember(?MemberModel $member): void;

    /**
     * Get Reminder
     *
     * @return Model\Dependency\Reminder\ReminderModel|null
     */
    public function getReminder(): ?Reminder\ReminderModelInterface;

    /**
     * Set Reminder
     *
     * @param Model\Dependency\Reminder\ReminderModel|null $reminder
     * @return void
     */
    public function setReminder(?Reminder\ReminderModel $reminder): void;

    /**
     * Get STPoint
     *
     * @return Model\Dependency\Point\STPointModel|null
     */
    public function getSTPoint(): ?Point\STPointModelInterface;

    /**
     * Set STPoint
     *
     * @param Model\Dependency\Point\STPointModel|null $stpoint
     * @return void
     */
    public function setSTPoint(?Point\STPointModel $stpoint): void;

    /**
     * Get OrderInfo
     *
     * @return Response\Member\GetMember\OrderInfoModel|null
     */
    public function getOrderInfo(): ?OrderInfoModelInterface;

    /**
     * Set OrderInfo
     *
     * @param Response\Member\GetMember\OrderInfoModel|null $orderInfo
     * @return void
     */
    public function setOrderInfo(?OrderInfoModel $orderInfo): void;
}