<?php

namespace Plugin\AceClient43\AceServices\AceMethod\Jyuden;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * 統合注文作成メソッド（AddCart + DecisionCart）
 *
 * 1回のAPI呼び出しで事前作成（AddCart）と確定（DecisionCart）を連続実行します。
 * リクエストは AddCart 相当の prm と DecisionCart のオプションを受け取ります。
 */
class CreateOrderMethod extends AbstractJyudenMethod
{
    /**
     * サービスのエンドポイント
     */
    private const END_POINT_SERVICE = 'service2.asmx';

    /**
     * {@inheritDoc}
     */
    protected function setEndPointService(): string
    {
        return self::END_POINT_SERVICE;
    }

    /**
     * {@inheritDoc}
     */
    protected function getRequestInterface(): string
    {
        return Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseInterface(): string
    {
        return Response\Jyuden\CreateOrder\CreateOrderResponseModelInterface::class;
    }

    /**
     * {@inheritDoc}
     *
     * @param Request\Jyuden\CreateOrder\CreateOrderRequestModel $requestModel
     *
     * @throws MissingRequestParameterException
     */
    public function withRequest(RequestModelInterface $requestModel): CreateOrderMethod
    {
        return parent::withRequest($requestModel);
    }
}
