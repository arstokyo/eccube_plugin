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

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceMethod;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceServiceInterface;

/**
 * Hanpu Service
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class HanpuService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Hanpu';

    /**
     * Make AddHanpuMethod
     *
     * @deprecated Inject AddHanpuMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Hanpu\AddHanpuMethod
     */
    public function makeAddHanpuMethod(): AceMethod\Hanpu\AddHanpuMethod
    {
        return new AceMethod\Hanpu\AddHanpuMethod($this->serviceRetriever);
    }

    /**
     * Make DecisionHanpuMethod
     *
     * @deprecated Inject DecisionHanpuMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Hanpu\DecisionHanpuMethod
     */
    public function makeDecisionHanpuMethod(): AceMethod\Hanpu\DecisionHanpuMethod
    {
        return new AceMethod\Hanpu\DecisionHanpuMethod($this->serviceRetriever);
    }

    /**
     * Make GetHanpuMethod
     *
     * @deprecated Inject GetHanpuMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Hanpu\GetHanpuMethod
     */
    public function makeGetHanpuMethod(): AceMethod\Hanpu\GetHanpuMethod
    {
        return new AceMethod\Hanpu\GetHanpuMethod($this->serviceRetriever);
    }

    /**
     * Make GetHanpuRirekiMethod
     *
     * @deprecated Inject GetHanpuRirekiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Hanpu\GetHanpuRirekiMethod
     */
    public function makeGetHanpuRirekiMethod(): AceMethod\Hanpu\GetHanpuRirekiMethod
    {
        return new AceMethod\Hanpu\GetHanpuRirekiMethod($this->serviceRetriever);
    }

    /**
     * Make AddHanpuNextMethod
     *
     * @deprecated Inject AddHanpuNextMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Hanpu\AddHanpuNextMethod
     */
    public function makeAddHanpuNextMethod(): AceMethod\Hanpu\AddHanpuNextMethod
    {
        return new AceMethod\Hanpu\AddHanpuNextMethod($this->serviceRetriever);
    }
}
