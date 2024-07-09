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
        return new AceMethod\Goods\GetGoodsMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetGoodsManyMethod
     *
     * @return AceMethod\Goods\GetGoodsManyMethod
     */
    public function makeGetGoodsManyMethod(): AceMethod\Goods\GetGoodsManyMethod
    {
        return new AceMethod\Goods\GetGoodsManyMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetZaikoMethod
     *
     * @return AceMethod\Goods\GetZaikoMethod
     */
    public function makeGetZaikoMethod(): AceMethod\Goods\GetZaikoMethod
    {
        return new AceMethod\Goods\GetZaikoMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetZaikoAllMethod
     *
     * @return AceMethod\Goods\GetZaikoAllMethod
     */
    public function makeGetZaikoAllMethod(): AceMethod\Goods\GetZaikoAllMethod
    {
        return new AceMethod\Goods\GetZaikoAllMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetGtankaMethod
     *
     * @return AceMethod\Goods\GetGtankaMethod
     */
    public function makeGetGtankaMethod(): AceMethod\Goods\GetGtankaMethod
    {
        return new AceMethod\Goods\GetGtankaMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetNyukaYoteiMethod
     *
     * @return AceMethod\Goods\GetNyukaYoteiMethod
     */
    public function makeGetNyukaYoteiMethod(): AceMethod\Goods\GetNyukaYoteiMethod
    {
        return new AceMethod\Goods\GetNyukaYoteiMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Make GetGoodsBunruiMethod
     *
     * @return AceMethod\Goods\GetGoodsBunruiMethod
     */
    public function makeGetGoodsBunruiMethod(): AceMethod\Goods\GetGoodsBunruiMethod
    {
        return new AceMethod\Goods\GetGoodsBunruiMethod($this->baseServiceName, $this->serviceRetriever);
    }
}