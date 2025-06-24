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

use Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods as RequestGetGoods;
use Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaiko as RequestGetZaiko;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods as ResponseGetGoods;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaiko as ResponseGetZaiko;
use Plugin\AceClient43\AceServices\Service\GoodsService;

class ProductBridge extends BaseBridge
{
    private GoodsService $goodsService;

    public function __construct(GoodsService $goodsService)
    {
        $this->goodsService = $goodsService;
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
        // Options が配列の場合は、JSON 文字列に変換
        $freeCodeJson = null;
        if (isset($options['_get_goods.free_code'])) {
            $freeCodeJson = json_encode(array_map(
                fn ($arr) => array_values(array_filter($arr, fn ($v) => $v !== null)),
                $options['_get_goods.free_code']
            ));
        }

        $request = (new RequestGetGoods\GetGoodsRequestModel())
            ->setId($this->getSyid())
            ->setExecDateFrom($updatedAtFrom)
            ->setExecDateTo($updatedAtTo)
            ->setOptions($freeCodeJson);

        try {
            $response = $this->goodsService->makeGetGoodsMethod()
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
        $request = (new RequestGetZaiko\GetZaikoRequestModel())
            ->setId($this->getSyid())
            ->setGdid($aceProductId)
            ->setSouko($warehouseId);

        try {
            $response = $this->goodsService->makeGetZaikoMethod()
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
}
