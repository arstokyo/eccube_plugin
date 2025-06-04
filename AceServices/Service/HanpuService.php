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
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class HanpuService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Hanpu';

    /**
     * Make AddHanpuMethod
     *
     * @return AceMethod\Hanpu\AddHanpuMethod
     */
    public function makeAddHanpuMethod(): AceMethod\Hanpu\AddHanpuMethod
    {
        return new AceMethod\Hanpu\AddHanpuMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make DecisionHanpuMethod
     *
     * @return AceMethod\Hanpu\DecisionHanpuMethod
     */
    public function makeDecisionHanpuMethod(): AceMethod\Hanpu\DecisionHanpuMethod
    {
        return new AceMethod\Hanpu\DecisionHanpuMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetHanpuMethod
     *
     * @return AceMethod\Hanpu\GetHanpuMethod
     */
    public function makeGetHanpuMethod(): AceMethod\Hanpu\GetHanpuMethod
    {
        return new AceMethod\Hanpu\GetHanpuMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetHanpuRirekiMethod
     *
     * @return AceMethod\Hanpu\GetHanpuRirekiMethod
     */
    public function makeGetHanpuRirekiMethod(): AceMethod\Hanpu\GetHanpuRirekiMethod
    {
        return new AceMethod\Hanpu\GetHanpuRirekiMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make AddHanpuNextMethod
     *
     * @return AceMethod\Hanpu\AddHanpuNextMethod
     */
    public function makeAddHanpuNextMethod(): AceMethod\Hanpu\AddHanpuNextMethod
    {
        return new AceMethod\Hanpu\AddHanpuNextMethod($this->baseServiceName, $this->serviceRetriever);
    }
}
