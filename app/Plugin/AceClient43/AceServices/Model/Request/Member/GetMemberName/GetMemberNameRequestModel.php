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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberName;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetMemberName Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberNameRequestModel extends RequestModelAbstract implements GetMemberNameRequestModelInterface
{
    use NoCategory\SyidTrait;

    use NoCategory\MbidTrait;
    public const XML_NODE_NAME = 'getMemberName';

    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) {
            throw new MissingRequestParameterException($this->compilePropertyName('syid'));
        }
        if (!$this->mbid) {
            throw new MissingRequestParameterException($this->compilePropertyName('mbid'));
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
