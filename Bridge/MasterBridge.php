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

use Plugin\AceClient43\AceServices\AceMethod\Master\GetFreeCdWithNameMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Master\V1\V1GetFreeCodeMethod;
use Plugin\AceClient43\AceServices\Model\Request\Master\GetFreeCdWithName as RequestGetFreeCdWithName;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Master\V1\GetFreeCode as RequestV1GetFreeCode;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetFreeCdWithName as ResponseGetFreeCdWithName;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Master\V1\GetFreeCode as ResponseV1GetFreeCode;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class MasterBridge extends BaseBridge
{
    protected GetFreeCdWithNameMethod $getFreeCdWithNameMethod;

    protected V1GetFreeCodeMethod $v1GetFreeCodeMethod;

    public function __construct(
        GetFreeCdWithNameMethod $getFreeCdWithNameMethod,
        V1GetFreeCodeMethod $v1GetFreeCodeMethod,
    ) {
        $this->getFreeCdWithNameMethod = $getFreeCdWithNameMethod;
        $this->v1GetFreeCodeMethod = $v1GetFreeCodeMethod;
    }

    /**
     * 名称付きのフリーコードを取得する
     *
     * @param string $code
     *
     * @return ResponseGetFreeCdWithName\FreeCodeModel[]|null
     *
     * @throws MissingRequestParameterException
     * @throws \Throwable
     */
    public function getFreeCodeWithName(string $code): ?array
    {
        /** @var RequestGetFreeCdWithName\GetFreeCdWithNameRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(RequestGetFreeCdWithName\GetFreeCdWithNameRequestModelInterface::class);

        $request = $requestModel
            ->setId($this->getSyid())
            ->setCode($code);

        try {
            $response = $this->getFreeCdWithNameMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('名称付きのフリーコードの取得に失敗しました: '.$response->getStatusCode());
            }

            /** @var ResponseGetFreeCdWithName\GetFreeCdWithNameResponseModel $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getMaster())) {
                if ($responseObject->getMaster()->getMessage()->getMessage1() == '該当商品がありません') {
                    return [];
                }
                throw new \RuntimeException('名称付きのフリーコードの取得に失敗しました: ');
            }

            return $responseObject->getMaster()->getFreeCd();
        } catch (\Throwable $e) {
            $this->logger->error(
                '名称付きのフリーコードの取得に失敗しました: '.$e->getMessage(),
                ['code' => $code, 'syid' => $this->getSyid()]
            );
            throw $e;
        }
    }

    /**
     * 名称付きのフリーコードを取得する
     *
     * @param int $kubun
     * @param array $codes
     *
     * @return ResponseV1GetFreeCode\V1GetFreeCodeItemModel[]|null
     *
     * @throws \RuntimeException
     */
    public function getFreeCodeV1(int $kubun, array $codes): ?array
    {
        /** @var RequestV1GetFreeCode\V1GetFreeCodeRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(RequestV1GetFreeCode\V1GetFreeCodeRequestModelInterface::class);

        $request = $requestModel
            ->setSyid($this->getSyid())
            ->setKubun($kubun)
            ->setCodes($codes)
        ;

        try {
            $response = $this->v1GetFreeCodeMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('名称付きのフリーコードの取得に失敗しました: '.$response->getStatusCode());
            }

            /** @var ResponseV1GetFreeCode\V1GetFreeCodeResponseModel $responseObject */
            $responseObject = $response->getResponse();

            return $responseObject->getItems();
        } catch (\Throwable $e) {
            $this->logger->error(
                '名称付きのフリーコードの取得に失敗しました: '.$e->getMessage(),
                ['kubun' => $kubun, 'codes' => $codes, 'syid' => $this->getSyid()]
            );
            throw new \RuntimeException('名称付きのフリーコードの取得に失敗しました: '.$e->getMessage());
        }
    }
}
