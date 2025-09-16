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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaiko;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetZaikoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetZaikoRequestModel extends RequestModelAbstract implements GetZaikoRequestModelInterface
{
    use NoCategory\IdTrait;

    use Souko\SoukoTrait;

    use Good\GdidTrait;
    public const XML_NODE_NAME = 'getZaiko';

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
        if (!$this->gdid) {
            throw new MissingRequestParameterException($this->compilePropertyName('gdid'));
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
