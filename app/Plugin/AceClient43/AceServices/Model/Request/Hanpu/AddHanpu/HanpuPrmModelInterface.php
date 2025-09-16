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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;

/**
 * Interface for HanpuModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanpuPrmModelInterface extends PrmModelInterface
{
    /**
     * Get Member
     *
     * @return MemberModel
     */
    public function getMember(): ?MemberModelInterface;

    /**
     * Set Member
     *
     * @param MemberModel $member
     *
     * @return self
     */
    public function setMember(?MemberModelInterface $member): self;

    /**
     * Get Handen
     *
     * @return HandenModel
     */
    public function getHanden(): ?HandenModelInterface;

    /**
     * Set Handen
     *
     * @param HandenModel $handen
     *
     * @return self
     */
    public function setHanden(?HandenModelInterface $handen): self;

    /**
     * Get Mailjyuden
     *
     * @return MailjyudenModel
     */
    public function getMailjyuden(): ?MailJyudenModelInterface;

    /**
     * Set Mailjyuden
     *
     * @param MailjyudenModel $mailjyuden
     *
     * @return self
     */
    public function setMailjyuden(?MailJyudenModelInterface $mailjyuden): self;

    /**
     * Get Detail
     *
     * @return DetailModel
     */
    public function getDetail(): ?DetailModelInterface;

    /**
     * Set Detail
     *s
     *
     * @param DetailModel $detail
     *
     * @return self
     */
    public function setDetail(?DetailModelInterface $detail): self;
}
