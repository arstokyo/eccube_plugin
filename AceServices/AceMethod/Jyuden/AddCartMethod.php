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

namespace Plugin\AceClient43\AceServices\AceMethod\Jyuden;

use Plugin\AceClient43\AceServices\AceMethod\AceMethodAbstract;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Add Cart Method
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AddCartMethod extends AceMethodAbstract
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
        return Request\Jyuden\AddCart\AddCartRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Jyuden\AddCart\AddCartResponseModelInterface::class;
    }

    /**
     * @param Request\Jyuden\AddCart\AddCartRequestModel $requestModel
     *
     * @throws MissingRequestParameterException
     */
    public function withRequest(RequestModelInterface $requestModel): AddCartMethod
    {
        return parent::withRequest($requestModel);
    }
}
