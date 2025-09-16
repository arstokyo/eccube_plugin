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

namespace Plugin\AceClient43\AceServices\Model\Request\Contact\RegContact;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class RegContactRequestModel extends Request\RequestModelAbstract implements RegContactRequestModelInterface
{
    use NoCategory\IdTrait;

    use NoCategory\SessIdTrait;
    public const XML_NODE_NAME = 'regContact';

    /** @var InquiryPrmModel Prm */
    private InquiryPrmModel $prm;

    /**
     * {@inheritDoc}
     */
    public function getPrm(): InquiryPrmModel
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrm(InquiryPrmModel $prm): self
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
