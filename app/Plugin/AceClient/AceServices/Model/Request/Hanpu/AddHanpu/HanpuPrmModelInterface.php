<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

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
    * @return Request\Hanpu\AddHanpu\MemberModel
    */
    public function getMember(): ?MemberModel;

    /**
     * Set Member
     *
     * @param Request\Hanpu\AddHanpu\MemberModel $member
     * @return self
     */
    public function setMember(?MemberModel $member): self;

    /**
    * Get Handen
    *
    * @return Request\Hanpu\AddHanpu\HandenModel
    */
    public function getHanden(): ?HandenModel;

    /**
     * Set Handen
     *
     * @param Request\Hanpu\AddHanpu\HandenModel $handen
     * @return self
     */
    public function setHanden(?HandenModel $handen): self;

    /**
    * Get Mailjyuden
    *
    * @return Request\Hanpu\AddHanpu\MailjyudenModel
    */
    public function getMailjyuden(): ?MailjyudenModel;

    /**
     * Set Mailjyuden
     *
     * @param Request\Hanpu\AddHanpu\MailjyudenModel $mailjyuden
     * @return self
     */
    public function setMailjyuden(?MailjyudenModel $mailjyuden): self;

    /**
    * Get Detail
    *
    * @return Request\Hanpu\AddHanpu\DetailModel
    */
    public function getDetail(): ?DetailModel;

    /**
     * Set Detail
     *s
     * @param Request\Hanpu\AddHanpu\DetailModel $detail
     * @return self
     */
    public function setDetail(?DetailModel $detail): self;
}