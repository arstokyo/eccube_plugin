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

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\IdTrait;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class RegMemAdrRequestModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrRequestModel extends RequestModelAbstract implements RegMemAdrRequestModelInterface
{
    use IdTrait;

    public const XML_NODE_NAME = 'regMemAdr';

    /** @var MemberPrmModelInterface Prm */
    private MemberPrmModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): MemberPrmModelInterface
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
        if (!$this->id) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
        }
        if (!$this->prm) {
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
