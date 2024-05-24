<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelExtend1Trait;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;
use Plugin\AceClient\AceServices\Model\Dependency\Point;


/**
 * Class for Login Member Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class LoginMemberModel implements LoginMemberModelInterface
{
    use HasMessageModelExtend1Trait;

    /**
     * @var ?MemberModelInterface $Member Member
     */
    private ?MemberModelInterface $Member;

    /**
     * @var ?Reminder\ReminderModelInterface $Reminder Reminder
     */
    private ?Reminder\ReminderModelInterface $Reminder;

    /**
     * @var ?Point\STPointModelInterface $STPoint STPoint
     */
    private ?Point\STPointModelInterface $STPoint;

    /**
     * @var ?OrderInfoModelInterface $OrderInfo OrderInfo
     */
    private ?OrderInfoModelInterface $OrderInfo;

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?MemberModelInterface
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
    public function getReminder(): ?Reminder\ReminderModelInterface
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
    public function getSTPoint(): ?Point\STPointModelInterface
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
    public function getOrderInfo(): ?OrderInfoModelInterface
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