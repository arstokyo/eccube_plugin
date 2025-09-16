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

namespace Plugin\AceClient43\AceServices\Model\Request\Master2\GetHaisouDay;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Model for Get Haisou Day Request
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetHaisouDayRequestModel extends RequestModelAbstract implements GetHaisouDayRequestModelInterface
{
    use Souko\SoukoTrait;
    use NoCategory\IdTrait;
    use Haiso\HcodeTrait;
    use Address\ZipTrait;

    public const XML_NODE_NAME = 'getHaisouDay';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
        }
        if (!$this->souko) {
            throw new MissingRequestParameterException($this->compilePropertyName('souko'));
        }
        if (!$this->hcode) {
            throw new MissingRequestParameterException($this->compilePropertyName('hcode'));
        }
        if (!$this->zip) {
            throw new MissingRequestParameterException($this->compilePropertyName('zip'));
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
