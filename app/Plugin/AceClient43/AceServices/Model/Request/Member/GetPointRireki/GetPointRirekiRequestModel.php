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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetPointRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPointRirekiRequestModel extends RequestModelAbstract implements GetPointRirekiRequestModelInterface
{
    use NoCategory\SyidTrait;

    use NoCategory\JmemidTrait;
    public const XML_NODE_NAME = 'getPointRireki';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) {
            throw new MissingRequestParameterException($this->compilePropertyName('syid'));
        }
        if (!$this->jmemid) {
            throw new MissingRequestParameterException($this->compilePropertyName('jmemid'));
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
