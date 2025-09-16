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

namespace Plugin\AceClient43\AceServices\Model\Request\Master2\GetHaisouDayTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetHaisouDayTimeRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHaisouDayTimeRequestModel extends RequestModelAbstract implements GetHaisouDayTimeRequestModelInterface
{
    use NoCategory\IdTrait;
    use Souko\SoukoTrait;
    use Haiso\HcodeTrait;
    use Address\ZipTrait;

    public const XML_NODE_NAME = 'getHaisouDayTime';

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
