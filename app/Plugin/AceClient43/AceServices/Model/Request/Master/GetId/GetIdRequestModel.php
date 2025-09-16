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

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetId;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;

/**
 * Class GetIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetIdRequestModel extends RequestModelAbstract implements GetIdRequestModelInterface
{
    public const XML_NODE_NAME = 'getId';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
