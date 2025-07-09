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
 * Goods Service
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class GoodsService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Goods';

    /**
     * Make GetGoodsMethod
     *
     * @deprecated Inject GetGoodsMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetGoodsMethod
     */
    public function makeGetGoodsMethod(): AceMethod\Goods\GetGoodsMethod
    {
        return new AceMethod\Goods\GetGoodsMethod($this->serviceRetriever);
    }

    /**
     * Make GetGoodsManyMethod
     *
     * @deprecated Inject GetGoodsManyMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetGoodsManyMethod
     */
    public function makeGetGoodsManyMethod(): AceMethod\Goods\GetGoodsManyMethod
    {
        return new AceMethod\Goods\GetGoodsManyMethod($this->serviceRetriever);
    }

    /**
     * Make GetZaikoMethod
     *
     * @deprecated Inject GetZaikoMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetZaikoMethod
     */
    public function makeGetZaikoMethod(): AceMethod\Goods\GetZaikoMethod
    {
        return new AceMethod\Goods\GetZaikoMethod($this->serviceRetriever);
    }

    /**
     * Make GetZaikoAllMethod
     *
     * @deprecated Inject GetZaikoAllMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetZaikoAllMethod
     */
    public function makeGetZaikoAllMethod(): AceMethod\Goods\GetZaikoAllMethod
    {
        return new AceMethod\Goods\GetZaikoAllMethod($this->serviceRetriever);
    }

    /**
     * Make GetGtankaMethod
     *
     * @deprecated Inject GetGtankaMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetGtankaMethod
     */
    public function makeGetGtankaMethod(): AceMethod\Goods\GetGtankaMethod
    {
        return new AceMethod\Goods\GetGtankaMethod($this->serviceRetriever);
    }

    /**
     * Make GetNyukaYoteiMethod
     *
     * @deprecated Inject GetNyukaYoteiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetNyukaYoteiMethod
     */
    public function makeGetNyukaYoteiMethod(): AceMethod\Goods\GetNyukaYoteiMethod
    {
        return new AceMethod\Goods\GetNyukaYoteiMethod($this->serviceRetriever);
    }

    /**
     * Make GetGoodsBunruiMethod
     *
     * @deprecated Inject GetGoodsBunruiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Goods\GetGoodsBunruiMethod
     */
    public function makeGetGoodsBunruiMethod(): AceMethod\Goods\GetGoodsBunruiMethod
    {
        return new AceMethod\Goods\GetGoodsBunruiMethod($this->serviceRetriever);
    }
}
