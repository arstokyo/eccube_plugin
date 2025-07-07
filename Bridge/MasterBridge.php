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

use Plugin\AceClient43\AceServices\Model\Request\Master\GetFreeCdWithName as RequestGetFreeCdWithName;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetFreeCdWithName as ResponseGetFreeCdWithName;
use Plugin\AceClient43\AceServices\Service\MasterService;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class MasterBridge extends BaseBridge
{
    private MasterService $masterService;

    public function __construct(MasterService $masterService)
    {
        $this->masterService = $masterService;
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
        $request = (new RequestGetFreeCdWithName\GetFreeCdWithNameRequestModel())
            ->setId($this->getSyid())
            ->setCode($code);

        try {
            $response = $this->masterService->makeGetFreeCdWithNameMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('名称付きのフリーコードの取得に失敗しました: '.$response->getStatusCode());
            }

            /** @var ResponseGetFreeCdWithName\GetFreeCdWithNameResponseModel $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getMaster())) {
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
}
