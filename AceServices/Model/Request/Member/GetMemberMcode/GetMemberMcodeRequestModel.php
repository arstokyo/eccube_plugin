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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetMemberMcodeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberMcodeRequestModel extends RequestModelAbstract implements GetMemberMcodeRequestModelInterface
{
    use NoCategory\McodeTrait;
    public const XML_NODE_NAME = 'getMemberMcode';

    /** @var IdPrmModelInterface|null */
    private ?IdPrmModelInterface $idPrm = null;

    /**
     * {@inheritDoc}
     */
    public function getIdPrm(): IdPrmModelInterface
    {
        return $this->idPrm;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdPrm(IdPrmModelInterface $idPrm): self
    {
        $this->idPrm = $idPrm;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->idPrm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('idPrm'));
        }
        if (empty($this->mcode)) {
            throw new MissingRequestParameterException($this->compilePropertyName('mcode'));
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
