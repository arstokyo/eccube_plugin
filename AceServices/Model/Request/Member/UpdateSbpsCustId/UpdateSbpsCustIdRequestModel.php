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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class UpdateSbpsCustIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class UpdateSbpsCustIdRequestModel extends RequestModelAbstract implements UpdateSbpsCustIdRequestModelInterface
{
    use NoCategory\SyidTrait;

    use NoCategory\MbidTrait;

    use Card\CedaTrait;

    use NoCategory\CustidTrait;
    public const XML_NODE_NAME = 'updateSbpsCustId';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) {
            throw new MissingRequestParameterException($this->compilePropertyName('syid'));
        }
        if (!$this->mbid) {
            throw new MissingRequestParameterException($this->compilePropertyName('mbid'));
        }
        if (!$this->custid) {
            throw new MissingRequestParameterException($this->compilePropertyName('custid'));
        }
        if (!$this->ceda) {
            throw new MissingRequestParameterException($this->compilePropertyName('ceda'));
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
