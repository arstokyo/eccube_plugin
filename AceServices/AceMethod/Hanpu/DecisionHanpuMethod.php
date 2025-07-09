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

namespace Plugin\AceClient43\AceServices\AceMethod\Hanpu;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Method for DecisionHanpu
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class DecisionHanpuMethod extends AbstractHanpuMethod
{
    /**
     * The End Point of Service.
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
        return Request\Hanpu\DecisionHanpu\DecisionHanpuRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Hanpu\DecisionHanpu\DecisionHanpuResponseModelInterface::class;
    }

    /**
     * @param Request\Hanpu\DecisionHanpu\DecisionHanpuRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}
