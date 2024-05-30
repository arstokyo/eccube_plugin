<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelExtend1Trait;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;
use Plugin\AceClient\AceServices\Model\Dependency\Point;


/**
 * Class for Login Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class LoginMemberModel implements LoginMemberModelInterface
{
    use HasMessageModelExtend1Trait;

    /**
     * @var ?MemberModel $Member Member
     */
    private ?MemberModel $Member;

    /**
     * @var ?Reminder\ReminderModel $Reminder Reminder
     */
    private ?Reminder\ReminderModel $Reminder;

    /**
     * @var ?Point\STPointModel $STPoint STPoint
     */
    private ?Point\STPointModel $STPoint;

    /**
     * @var ?OrderInfoModel $OrderInfo OrderInfo
     */
    private ?OrderInfoModel $OrderInfo;

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?MemberModel
    {
        return $this->Member;
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(?MemberModel $member): void
    {
        $this->Member = $member;
    }

    /**
     * {@inheritDoc}
     */
    public function getReminder(): ?Reminder\ReminderModel
    {
        return $this->Reminder;
    }

    /**
     * {@inheritDoc}
     */
    public function setReminder(?Reminder\ReminderModel $reminder): void
    {
        $this->Reminder = $reminder;
    }

    /**
     * {@inheritDoc}
     */
    public function getSTPoint(): ?Point\STPointModel
    {
        return $this->STPoint;
    }

    /**
     * {@inheritDoc}
     */
    public function setSTPoint(?Point\STPointModel $stpoint): void
    {
        $this->STPoint = $stpoint;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderInfo(): ?OrderInfoModel
    {
        return $this->OrderInfo;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderInfo(?OrderInfoModel $orderInfo): void
    {
        $this->OrderInfo = $orderInfo;
    }

}