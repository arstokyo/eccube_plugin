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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Trait;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder;

/**
 * Class for Login Member Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class LoginMemberModel implements LoginMemberModelInterface
{
    use HasMessageModelExtend1Trait;

    /**
     * @var ?MemberModelInterface Member
     */
    private ?MemberModelInterface $Member;

    /**
     * @var ?Reminder\ReminderModelInterface Reminder
     */
    private ?Reminder\ReminderModelInterface $Reminder;

    /**
     * @var ?Point\STPointModelInterface STPoint
     */
    private ?Point\STPointModelInterface $STPoint;

    /**
     * @var ?OrderInfoModelInterface OrderInfo
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
