<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetReminder;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\GetReminder\MemberModel;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface ReminderResponseModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface GetReminderResponseModelInterface extends ResponseModelInterface
{
    /**
    * Get Member
    *
    * @return Response\Member\GetReminder\MemberModel
    */
    public function getMember():MemberModel;
    /**
    * Set Member
    *
    * @return void
    */
    public function setMember(MemberModel $member): void;
}
