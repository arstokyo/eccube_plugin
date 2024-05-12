<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;
use Plugin\AceClient\AceServices\Model;

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
}