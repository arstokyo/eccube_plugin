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

namespace Plugin\AceClient43\AceServices\AceMethod\Master;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetFreeCdWithName\GetFreeCdWithNameResponseModel;

/**
 * Method for GetFreeCdWithName
 *
 * @method self withRequest(Request\Master\GetFreeCdWithName\GetFreeCdWithNameRequestModelInterface $requestModel)
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetFreeCdWithNameMethod extends AceMethodAbstract
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service2.asmx';

    /**
     * {@inheritDoc}
     */
    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    /**
     * {@inheritDoc}
     */
    protected function setResponseAsObject(): string
    {
        return GetFreeCdWithNameResponseModel::class;
    }
}
