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

namespace Plugin\AceClient43\Bridge;

use Plugin\AceClient43\AceServices\AceMethod\Goods\GetGoodsMethod;
use Plugin\AceClient43\AceServices\AceMethod\Goods\GetZaikoMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Goods\V1\V1GetStockByUpdateMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Goods\V1\V1GoodsItemsMethod;
use Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods as RequestGetGoods;
use Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods\IdPrmModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods\OptionsModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaiko as RequestGetZaiko;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GetStockByUpdate\V1GetStockByUpdateRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItems\V1GoodsItemsRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods as ResponseGetGoods;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaiko as ResponseGetZaiko;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate\V1GetStockByUpdateItemModel;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate\V1GetStockByUpdateResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItems\V1GoodsItemsResponseModelInterface;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PreGetItemsEvent;

class ProductBridge extends BaseBridge
{
    protected GetGoodsMethod $getGoodsMethod;

    protected GetZaikoMethod $getZaikoMethod;

    protected V1GetStockByUpdateMethod $v1GetStockByUpdateMethod;

    /** @var V1GoodsItemsMethod|null WebAPI goods v1 一覧メソッド（任意） */
    protected V1GoodsItemsMethod $v1GetGoodsListMethod;

    public function __construct(
        GetGoodsMethod $getGoodsMethod,
        GetZaikoMethod $getZaikoMethod,
        V1GetStockByUpdateMethod $v1GetStockByUpdateMethod,
        V1GoodsItemsMethod $v1GetGoodsListMethod,
    ) {
        $this->getGoodsMethod = $getGoodsMethod;
        $this->getZaikoMethod = $getZaikoMethod;
        $this->v1GetStockByUpdateMethod = $v1GetStockByUpdateMethod;
        $this->v1GetGoodsListMethod = $v1GetGoodsListMethod;
    }

    /**
     * 商品情報を取得します。
     *
     * @param \DateTime $updatedAtFrom 更新日時の開始
     * @param \DateTime $updatedAtTo 更新日時の終了
     * @param array $options オプション
     *
     * @return ResponseGetGoods\MasterModelInterface|null
     *
     * @throws \RuntimeException
     */
    public function getAll(\DateTime $updatedAtFrom, \DateTime $updatedAtTo, array &$options = []): ?ResponseGetGoods\MasterModelInterface
    {
        $freeCode = $options['_get_goods.options_freecode'] ?? [];

        /** @var RequestGetGoods\GetGoodsRequestModelInterface $requestModel */
        /** @var IdPrmModelInterface $prmModel */
        /** @var OptionsModelInterface $optionModel */
        $requestModel = $this->createRequestModel(RequestGetGoods\GetGoodsRequestModelInterface::class);
        $prmModel = $this->createSubModel(IdPrmModelInterface::class);
        $optionModel = $this->createSubModel(OptionsModelInterface::class);

        $optionModel->setReturnGoodsKubun($freeCode);

        if (isset($options['_get_goods.import_stock']) && $options['_get_goods.import_stock']) {
            $optionModel->setIncludeZaiko(true);
        }

        if (isset($options['_get_goods.import_stock_skid']) && 0 < $importSkid = (int) $options['_get_goods.import_stock_skid']) {
            $optionModel->setIncludeZaikoSkid($importSkid);
        }

        if (isset($options['_get_goods.extra_fields']) && $options['_get_goods.extra_fields']) {
            $optionModel->setExtraFields($options['_get_goods.extra_fields']);
        }

        // フィルターが設定されている場合
        if (isset($options['_get_goods.filters']) && count($options['_get_goods.filters']) > 0) {
            /** @var RequestGetGoods\FiltersModelInterface $filters */
            $filters = $this->createSubModel(RequestGetGoods\FiltersModelInterface::class);

            /** @var RequestGetGoods\FilterModelInterface[] $arrayFilters */
            $arrayFilters = [];

            foreach ($options['_get_goods.filters'] as $filter) {
                /** @var RequestGetGoods\FilterModelInterface $filterModel */
                $filterModel = $this->createSubModel(RequestGetGoods\FilterModelInterface::class);

                $filterModel->setValue($filter['value'])
                            ->setType($filter['type']);
                $arrayFilters[] = $filterModel;
            }

            $filters->setFilter($arrayFilters);
            $optionModel->setFilters($filters);
        }

        // 更新日時を無視する場合
        if (isset($options['_get_goods.ignore_udate']) && $options['_get_goods.ignore_udate']) {
            $optionModel->setIgnoreUdate($options['_get_goods.ignore_udate']);
        }

        $prmModel->setSyid($this->getSyid())
                 ->setOptions($optionModel);

        $request = $requestModel->setIdPrm($prmModel)
                                ->setExecDateFrom($updatedAtFrom)
                                ->setExecDateTo($updatedAtTo);

        try {
            $response = $this->getGoodsMethod
                             ->withRequest($request)
                             ->send();
            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('商品情報の取得に失敗しました。(レスポンスコード：%s)', $response->getStatusCode()));
            }

            /** @var ResponseGetGoods\MasterModelInterface $master */
            $master = $response->getResponse()->getMaster();
            if ($this->hasErrorMessage($master)) {
                if ($master->getMessage()->getMessage1() == '該当商品単価がありません') {
                    return null;
                }

                throw new \RuntimeException('商品情報の取得に失敗しました。'.$master->getMessage()->getMessage1());
            }

            return $master;
        } catch (\Throwable $e) {
            throw new \RuntimeException('商品情報の取得に失敗しました。', 0, $e);
        }
    }

    /**
     * 商品の在庫情報を取得します。
     *
     * @param string $aceProductId 商品ID
     * @param string $warehouseId 倉庫ID
     * @param array $options
     *
     * @return int
     */
    public function getStock(string $aceProductId, string $warehouseId = '0000000', array &$options = []): int
    {
        /** @var RequestGetZaiko\GetZaikoRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(RequestGetZaiko\GetZaikoRequestModelInterface::class);
        $request = $requestModel
            ->setId($this->getSyid())
            ->setGdid($aceProductId)
            ->setSouko($warehouseId);

        try {
            $response = $this->getZaikoMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('在庫情報の取得に失敗しました。(レスポンスコード：%s)', $response->getStatusCode()));
            }

            /** @var ResponseGetZaiko\MasterModelInterface $master */
            $master = $response->getResponse()->getMaster();
            if ($this->hasErrorMessage($master)) {
                if ($master->getMessage()->getMessage1() == '該当商品がありません') {
                    return 0;
                }

                throw new \RuntimeException('在庫情報の取得に失敗しました'.$master->getMessage()->getMessage1());
            }

            return $master->getGoods()->getZaiko() ?? 0;
        } catch (\Throwable $e) {
            throw new \RuntimeException('在庫情報の取得に失敗しました。', 0, $e);
        }
    }

    /**
     * 更新日時で在庫一覧（WebApi v1）を取得します（JSON GET）。
     *
     * @param \DateTimeInterface $updateFrom
     * @param \DateTimeInterface|null $toDate
     * @param string|null $skid
     * @param int $page
     * @param int $limit
     *
     * @return V1GetStockByUpdateItemModel[]
     */
    public function getStockByUpdateV1(
        \DateTimeInterface $updateFrom,
        ?\DateTimeInterface $toDate = null,
        ?string $skid = null,
        int $page = 1,
        int $limit = 300,
    ): array {
        /** @var V1GetStockByUpdateRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(V1GetStockByUpdateRequestModelInterface::class);
        $request = $requestModel
            ->setSyid($this->getSyid())
            ->setUpdateFrom($updateFrom)
            ->setToDate($toDate)
            ->setSkid($skid)
            ->setPage($page)
            ->setLimit($limit);

        try {
            $response = $this->v1GetStockByUpdateMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('在庫一覧（更新日）取得に失敗しました。(レスポンスコード：%s)', $response->getStatusCode()));
            }

            /** @var V1GetStockByUpdateResponseModelInterface $model */
            $model = $response->getResponse();

            return $model->getItems();
        } catch (\Throwable $e) {
            throw new \RuntimeException('在庫一覧（更新日）の取得に失敗しました。', 0, $e);
        }
    }

    /**
     * 更新日時で在庫一覧（WebApi v1）を取得します（ページ情報付きレスポンス）。
     *
     * ループ処理などでページネーション制御が必要な場合に使用してください。
     *
     * @return V1GetStockByUpdateResponseModelInterface
     */
    public function getStockByUpdateV1Response(
        \DateTimeInterface $updateFrom,
        ?\DateTimeInterface $toDate = null,
        ?string $skid = null,
        int $page = 1,
        int $limit = 300,
    ): V1GetStockByUpdateResponseModelInterface {
        /** @var V1GetStockByUpdateRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(V1GetStockByUpdateRequestModelInterface::class);
        $request = $requestModel
            ->setSyid($this->getSyid())
            ->setUpdateFrom($updateFrom)
            ->setToDate($toDate)
            ->setSkid($skid)
            ->setPage($page)
            ->setLimit($limit);

        $response = $this->v1GetStockByUpdateMethod
            ->withRequest($request)
            ->send();

        if (!$response->isOk()) {
            throw new \RuntimeException(sprintf('在庫一覧（更新日）取得に失敗しました。(レスポンスコード：%s)', $response->getStatusCode()));
        }

        /** @var V1GetStockByUpdateResponseModelInterface $model */
        $model = $response->getResponse();

        return $model;
    }

    /**
     * WebApi v1: 商品一覧（goods/v1/items）を呼び出します。
     * DI未設定の場合は例外を投げます（後方互換のため任意依存）。
     *
     * @return V1GoodsItemsResponseModelInterface
     */
    public function getItems(
        array $gdids,
        array $freeKubuns = [],
        ?string $skid = null,
        array $options = [],
    ): V1GoodsItemsResponseModelInterface {
        /** @var V1GoodsItemsRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(V1GoodsItemsRequestModelInterface::class);
        $request = $requestModel
            ->setSyid($this->getSyid())
            ->setGdids($gdids)
            ->setSkid($skid);

        // Set freeKubuns directly if provided
        if (!empty($freeKubuns)) {
            $request->setFreeKubuns($freeKubuns);
        }

        if ($this->eventDispatcher->hasListeners(Events::PRE_GET_ITEMS)) {
            $event = new PreGetItemsEvent($request, $gdids, $freeKubuns, $skid, $options);
            $this->eventDispatcher->dispatch($event, Events::PRE_GET_ITEMS);
        }

        try {
            $response = $this->v1GetGoodsListMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('商品一覧（v1）取得に失敗しました。(レスポンスコード：%s)', $response->getStatusCode()));
            }

            /* @var V1GoodsItemsResponseModelInterface $payload */
            return $response->getResponse();
        } catch (\Throwable $e) {
            throw new \RuntimeException('商品一覧（v1）の取得に失敗しました。', 0, $e);
        }
    }
}
