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
 * Method for UpdateTaikai
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class UpdateTaikaiMethod extends AbstractMemberMethod
{
    /**
     * The End Point of Service.
     */
    private const END_POINT_SERVICE = 'service3.asmx';

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
        return Request\Member\UpdateTaikai\UpdateTaikaiRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Member\UpdateTaikai\UpdateTaikaiResponseModelInterface::class;
    }

    /**
     * @param Request\Member\UpdateTaikai\UpdateTaikaiRequestModel $requestModel
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        return parent::withRequest($requestModel);
    }
}
