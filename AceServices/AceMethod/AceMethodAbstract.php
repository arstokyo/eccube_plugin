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

namespace Plugin\AceClient43\AceServices\AceMethod;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Plugin\AceClient43\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Abstract Class for Ace Method
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class AceMethodAbstract implements AceMethodInterface
{
    /**
     * @var AceMethodAssistant
     */
    protected AceMethodAssistant $assistant;

    /**
     * AceMethodAbstract Constructor
     *
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct(ServiceRetrieverInterface $serviceRetriever)
    {
        $baseServiceName = $this->getBaseServiceName();
        $this->assistant = new AceMethodAssistant(\get_class($this), self::buildEndPoint($baseServiceName), $serviceRetriever);
    }

    /**
     * {@inheritDoc}
     */
    public function withRequest(Request\RequestModelInterface $requestModel): self
    {
        $requestModel->ensureParameterNotMissing();

        $this->assistant->getApiClient()->withRequest($requestModel);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function send(): ResponseInterface
    {
        $this->assistant->getApiClient()->withResponseAs(self::getResponseAsObject());

        return $this->assistant->getApiClient()->send();
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata(): ClientMetadataInterface
    {
        return $this->assistant->getApiClient()->getMetadata();
    }

    /**
     * Build the end point.
     *
     * @param string $baseService
     *
     * @return string
     */
    private function buildEndPoint(string $baseService): string
    {
        return sprintf('%s/%s', $baseService, $this->setEndPointService());
    }

    /**
     * Set the request method name.
     *
     * @return string
     */
    abstract protected function setEndPointService(): string;

    abstract protected function getRequestInterface(): string;

    abstract protected function getResponseInterface(): string;

    abstract protected function getBaseServiceName(): string;

    /**
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    private function getResponseAsObject(): string
    {
        $responseInterface = $this->getResponseInterface();

        // 1. 設定ファイルから検索
        $responseClass = $this->getResponseClassFromConfig($responseInterface);

        // 2. 設定にない場合は自動検出
        if (!$responseClass) {
            $responseClass = $this->resolveResponseClassAutomatically($responseInterface);
        }

        // 3. 見つからない場合はエラー
        if (!$responseClass) {
            throw new InvalidClassNameException("Response class not found for interface: {$responseInterface}");
        }

        ClassFactory::validateClassExists($responseClass);

        return ClassFactory::validateCompatible($responseClass, ResponseModelInterface::class);
    }

    private function getResponseClassFromConfig(string $responseInterface): ?string
    {
        try {
            $parameterBag = $this->assistant->getServiceRetriever()->getParameterBag();
            $mappings = $parameterBag->get('ace.request_response_mapping');

            return $mappings[$responseInterface]['response'] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function resolveResponseClassAutomatically(string $responseInterface): ?string
    {
        try {
            $modelResolver = $this->assistant->getServiceRetriever()->getModelResolver();

            return $modelResolver->findResponseModel($responseInterface);
        } catch (\Exception $e) {
            return null;
        }
    }
}
