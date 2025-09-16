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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class CheckDuplicationMemberRequestModel extends Request\RequestModelAbstract implements CheckDuplicationMemberRequestModelInterface
{
    use NoCategory\SyidTrait;
    public const XML_NODE_NAME = 'checkDuplicationMember';

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
    public function setPrm(MemberPrmModel $prm): self
    {
        $this->prm = $prm;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->syid)) {
            throw new MissingRequestParameterException($this->compilePropertyName('syid'));
        }
        if (empty($this->prm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('prm'));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
