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

use Plugin\AceClient43\AceServices\Model;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Reminder;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModel;

/**
 * Interface for Login Member Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface LoginMemberModelInterface extends HasMessageModelExtend1Interface, AsListDenormalizableInterface
{
    /**
     * Get Member
     *
     * @return MemberModel|null
     */
    public function getMember(): ?MemberModelInterface;

    /**
     * Set Member
     *
     * @param MemberModel|null $member
     *
     * @return void
     */
    public function setMember(?MemberModel $member): void;

    /**
     * Get Reminder
     *
     * @return Reminder\ReminderModel|null
     */
    public function getReminder(): ?Reminder\ReminderModelInterface;

    /**
     * Set Reminder
     *
     * @param Reminder\ReminderModel|null $reminder
     *
     * @return void
     */
    public function setReminder(?Reminder\ReminderModel $reminder): void;

    /**
     * Get STPoint
     *
     * @return Point\STPointModel|null
     */
    public function getSTPoint(): ?Point\STPointModelInterface;

    /**
     * Set STPoint
     *
     * @param Point\STPointModel|null $stpoint
     *
     * @return void
     */
    public function setSTPoint(?Point\STPointModel $stpoint): void;

    /**
     * Get OrderInfo
     *
     * @return OrderInfoModel|null
     */
    public function getOrderInfo(): ?OrderInfoModelInterface;

    /**
     * Set OrderInfo
     *
     * @param OrderInfoModel|null $orderInfo
     *
     * @return void
     */
    public function setOrderInfo(?OrderInfoModel $orderInfo): void;

    /**
     * Get HaisouAdrs
     *
     * @return GetHaisouAdrsModel[]|null
     */
    public function getGetHaisouAdrs(): ?array;

    /**
     * Set HaisouAdrs
     *
     * @param GetHaisouAdrsModel[]|null $haisouAdrs
     *
     * @return self
     */
    public function setGetHaisouAdrs(?array $getHaisouAdrs): self;
}
