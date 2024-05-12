<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelExtend1Trait;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;

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
    
}