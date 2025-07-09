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
 * Method for RegmemAdr
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrMethod extends AbstractMemberMethod
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
        return Request\Member\RegMemAdr\RegMemAdrRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Member\RegMemAdr\RegMemAdrResponseModelInterface::class;
    }

    /**
     * @param Request\Member\RegMemAdr\RegMemAdrRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}
