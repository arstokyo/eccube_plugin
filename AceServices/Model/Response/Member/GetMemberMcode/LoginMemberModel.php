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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Trait;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder;

/**
 * Class for Login Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class LoginMemberModel implements LoginMemberModelInterface
{
    use HasMessageModelExtend1Trait;

    /**
     * @var ?MemberModel Member
     */
    private ?MemberModel $Member;

    /**
     * @var ?Reminder\ReminderModel Reminder
     */
    private ?Reminder\ReminderModel $Reminder;

    /**
     * @var ?Point\STPointModel STPoint
     */
    private ?Point\STPointModel $STPoint;

    /**
     * @var ?OrderInfoModel OrderInfo
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
