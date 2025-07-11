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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Decision Cart Request Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DecisionCartRequestModel extends RequestModelAbstract implements DecisionCartRequestModelInterface
{
    use NoCategory\SessIdTrait;

    /** @var IdPrmModelInterface|null */
    private ?IdPrmModelInterface $idPrm = null;

    public const XML_NODE_NAME = 'decisionCart';

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
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->idPrm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('idPrm'));
        }
        if (empty($this->sessId)) {
            throw new MissingRequestParameterException($this->compilePropertyName('sessId'));
        }
    }
}
