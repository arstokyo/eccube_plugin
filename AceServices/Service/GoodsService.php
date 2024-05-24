<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

/**
 * Goods Service
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GoodsService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Goods';

    /**
     * Make GetGoodsMethod
     *
     * @return AceMethod\Goods\GetGoodsMethod
     */
    public function makeGetGoodsMethod(): AceMethod\Goods\GetGoodsMethod
    {
        return new AceMethod\Goods\GetGoodsMethod($this->baseServiceName);
    }
    /**
     * Make GetGoodsManyMethod
     *
     * @return AceMethod\Goods\GetGoodsManyMethod
     */
    public function makeGetGoodsManyMethod(): AceMethod\Goods\GetGoodsManyMethod
    {
        return new AceMethod\Goods\GetGoodsManyMethod($this->baseServiceName);
    }
}