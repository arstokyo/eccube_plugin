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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class MemberPrmModel extends PrmModelAbstract implements MemberPrmModelInterface
{
    public const PRM_NODE_NAME = 'member';

    /** @var NmemberModel|null 納品先 */
    private ?NmemberModelInterface $nmember = null;

    /** @var OptionsModelInterface|null オプション */
    private ?OptionsModelInterface $options = null;

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
    public function setOptions(?OptionsModelInterface $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): ?OptionsModelInterface
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->nmember) {
            throw new MissingRequestParameterException($this->compilePropertyName('nmember'));
        }
        if (!$this->nmember->getCode()) {
            throw new MissingRequestParameterException($this->compilePropertyName('nmember.code'));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }
}
