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

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetFreeCdWithName;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetHolidayRequestModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetFreeCdWithNameRequestModel extends RequestModelAbstract implements GetFreeCdWithNameRequestModelInterface
{
    use NoCategory\CodeTrait;

    use NoCategory\IdTrait;

    public const XML_NODE_NAME = 'getFreeCdWithName';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
        }
        if (!$this->code) {
            throw new MissingRequestParameterException($this->compilePropertyName('code'));
        }
    }

    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
