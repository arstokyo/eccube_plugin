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

namespace Plugin\AceClient43\AceServices\AceMethod\Master2;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Get Haisou Day Method
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetHaisouDayMethod extends AbstractMaster2Method
{
    /**
     * The End Point of Service.nse
     */
    private const END_POINT_SERVICE = 'service1.asmx';

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
    protected function getRequestInterface(): string
    {
        return Request\Master2\GetHaisouDay\GetHaisouDayRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Master2\GetHaisouDay\GetHaisouDayResponseModelInterface::class;
    }

    /**
     * @param Request\Master2\GetHaisouDay\GetHaisouDayRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}
