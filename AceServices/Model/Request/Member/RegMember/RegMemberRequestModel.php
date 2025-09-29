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

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class RegMemberRequestModel extends Request\RequestModelAbstract implements RegMemberRequestModelInterface
{
    use NoCategory\IdTrait;

    use NoCategory\SessIdTrait;
    public const XML_NODE_NAME = 'regMember';

    /** @var MemberPrmModel Prm */
    private MemberPrmModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): MemberPrmModel
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(MemberPrmModelInterface $prm): self
    {
        $this->prm = $prm;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->id)) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
        }
        if (empty($this->sessId)) {
            throw new MissingRequestParameterException($this->compilePropertyName('sessId'));
        }
        if (empty($this->prm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('prm'));
        }
        $this->prm->ensureParameterNotMissing();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
