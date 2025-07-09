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

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Method for GetMemAnkFreeCd
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GetMemAnkFreeCdMethod extends AbstractMasterMethod
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
    protected function getRequestInterface(): string
    {
        return Request\Master\GetMemAnkFreeCd\GetMemAnkFreeCdRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Master\GetMemAnkFreeCd\GetMemAnkFreeCdResponseModelInterface::class;
    }

    /**
     * @param Request\Master\GetMemAnkFreeCd\GetMemAnkFreeCdRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}
