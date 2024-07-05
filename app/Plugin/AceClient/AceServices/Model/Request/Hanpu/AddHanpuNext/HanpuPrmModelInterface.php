<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelInterface;

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
    * @return Request\Hanpu\AddHanpuNext\MemberModel
    */
    public function getMember(): ?MemberModel;

    /**
     * Set Member
     *
     * @param Request\Hanpu\AddHanpuNext\MemberModel $member
     * @return self
     */
    public function setMember(?MemberModel $member): self;

    /**
    * Get Handen
    *
    * @return Request\Hanpu\AddHanpuNext\HandenModel
    */
    public function getHanden(): ?HandenModel;

    /**
     * Set Handen
     *
     * @param Request\Hanpu\AddHanpuNext\HandenModel $handen
     * @return self
     */
    public function setHanden(?HandenModel $handen): self;

    /**
    * Get Mailjyuden
    *
    * @return Request\Hanpu\AddHanpuNext\MailjyudenModel
    */
    public function getMailjyuden(): ?MailjyudenModel;

    /**
     * Set Mailjyuden
     *
     * @param Request\Hanpu\AddHanpuNext\MailjyudenModel $mailjyuden
     * @return self
     */
    public function setMailjyuden(?MailjyudenModel $mailjyuden): self;

    /**
    * Get Detail
    *
    * @return Request\Hanpu\AddHanpuNext\DetailModel
    */
    public function getDetail(): ?DetailModel;

    /**
     * Set Detail
     *
     * @param Request\Hanpu\AddHanpuNext\DetailModel $detail
     * @return self
     */
    public function setDetail(?DetailModel $detail): self;
}