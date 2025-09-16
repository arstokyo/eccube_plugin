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

namespace Plugin\AceClient43\AceServices\AceMethod\Member;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Method for UpdateSbpsCustId
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class UpdateSbpsCustIdMethod extends AbstractMemberMethod
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service4.asmx';

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
        return Request\Member\UpdateSbpsCustId\UpdateSbpsCustIdRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Member\UpdateSbpsCustId\GetSbpsCustIdResponseModelInterface::class;
    }

    /**
     * @param Request\Member\UpdateSbpsCustId\UpdateSbpsCustIdRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}
