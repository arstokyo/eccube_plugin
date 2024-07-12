<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetReminder;

use Plugin\AceClient43\AceServices\Model\Response\Member\GetReminder\GetReminderResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetReminder\MemberModel;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
/**
 * Class ReminderResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class GetReminderResponseModel extends ResponseModelAbtract implements GetReminderResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\GetReminder\MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param Response\Member\GetReminder\MemberModel $member
    */
    function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}