<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

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