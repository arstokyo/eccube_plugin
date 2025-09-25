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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;
use Symfony\Component\Serializer\Annotation\SerializedName;

class MemberPrmModel extends PrmModelAbstract implements MemberPrmModelInterface
{
    public const PRM_NODE_NAME = 'member';

    /** @var JmemberModelInterface|null 受注先 */
    private ?JmemberModelInterface $jmember = null;

    /** @var NmemberModelInterface|null 納品先 */
    private ?NmemberModelInterface $nmember = null;

    /** @var SmemberModelInterface|null 請求先 */
    private ?SmemberModelInterface $smember = null;

    /**
     * @var JmemberFreeModelInterface|null
     *
     * @SerializedName("jmemberfree")
     */
    private ?JmemberFreeModelInterface $jmemberFree = null;

    /**
     * {@inheritDoc}
     */
    public function getJmember(): ?JmemberModelInterface
    {
        return $this->jmember;
    }

    /**
     * {@inheritDoc}
     */
    public function setJmember(?JmemberModelInterface $jmember): self
    {
        $this->jmember = $jmember;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJmemberFree(): ?JmemberFreeModelInterface
    {
        return $this->jmemberFree;
    }

    /**
     * {@inheritDoc}
     */
    public function setJmemberFree(?JmemberFreeModelInterface $jmemberFree): self
    {
        $this->jmemberFree = $jmemberFree;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?NmemberModelInterface
    {
        return $this->nmember;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?NmemberModelInterface $nmember): self
    {
        $this->nmember = $nmember;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSmember(): ?SmemberModelInterface
    {
        return $this->smember;
    }

    /**
     * {@inheritDoc}
     */
    public function setSmember(?SmemberModelInterface $smember): self
    {
        $this->smember = $smember;

        return $this;
    }

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
}
