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

use Plugin\AceClient43\AceServices\AceMethod\RequestCacheableMethodInterface;
use Plugin\AceClient43\AceServices\AceMethod\RequestCacheableTrait;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Add Cart Method
 *
 * @method withRequest(Request\Jyuden\AddCart\AddCartRequestModelInterface $requestModel): AddCartMethod
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AddCartMethod extends AbstractJyudenMethod implements RequestCacheableMethodInterface
{
    use RequestCacheableTrait;

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
}
