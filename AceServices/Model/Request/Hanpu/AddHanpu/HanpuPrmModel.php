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

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class HanpuPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuPrmModel extends PrmModelAbstract implements HanpuPrmModelInterface
{
    public const PRM_NODE_NAME = 'hanpu';

    /**
     * Handen
     *
     * @var HandenModelInterface
     */
    protected ?HandenModelInterface $handen = null;

    /**
     * Member
     *
     * @var MemberModelInterface
     */
    protected ?MemberModelInterface $member = null;

    /**
     * Detail
     *
     * @var DetailModelInterface
     */
    protected ?DetailModelInterface $detail = null;

    /**
     * Mailjyuden
     *
     * @var MailJyudenModelInterface
     */
    protected ?MailJyudenModelInterface $mailjyuden = null;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        // ignore
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?MemberModelInterface
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(?MemberModelInterface $member): self
    {
        $this->member = $member;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanden(): ?HandenModelInterface
    {
        return $this->handen;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanden(?HandenModelInterface $handen): self
    {
        $this->handen = $handen;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailjyuden(): ?MailJyudenModelInterface
    {
        return $this->mailjyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailjyuden(?MailJyudenModelInterface $mailjyuden): self
    {
        $this->mailjyuden = $mailjyuden;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDetail(): ?DetailModelInterface
    {
        return $this->detail;
    }

    /**
     * {@inheritDoc}
     */
    public function setDetail(?DetailModelInterface $detail): self
    {
        $this->detail = $detail;

        return $this;
    }
}
