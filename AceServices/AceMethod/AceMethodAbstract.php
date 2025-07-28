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
use Plugin\AceClient43\ApiClient\ApiClientResolver;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;
use Plugin\AceClient43\ApiClient\Client\ClientMetadataInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Abstract Class for Ace Method
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class AceMethodAbstract implements AceMethodInterface
{
    protected ClientInterface $apiClient;

    protected ModelResolver $modelResolver;

    protected ParameterBagInterface $parameterBag;

    /**
     * AceMethodAbstract Constructor
     *
     * @param ApiClientResolver $clientResolver
     * @param ModelResolver $modelResolver
     * @param ParameterBagInterface $parameterBag
     *
     * @throws InvalidClassNameException
     */
    public function __construct(
        ApiClientResolver $clientResolver,
        ModelResolver $modelResolver,
        ParameterBagInterface $parameterBag,
    ) {
        $this->modelResolver = $modelResolver;
        $this->parameterBag = $parameterBag;
        $this->apiClient = $this->resolveApiClient($clientResolver);
    }

    protected function buildEndPoint(): string
    {
        $baseServiceName = $this->getBaseServiceName();

        return sprintf('%s/%s', $baseServiceName, $this->setEndPointService());
    }

    /**
     * {@inheritDoc}
     */
    public function withRequest(Request\RequestModelInterface $requestModel): self
    {
        $requestModel->ensureParameterNotMissing();

        $this->apiClient->withRequest($requestModel);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function send(): ResponseInterface
    {
        // Set the endpoint just before sending to ensure it's correct for this specific call
        $this->apiClient->withEndpoint($this->buildEndPoint());

        $this->apiClient->withResponseAs($this->getResponseAsObject());

        return $this->apiClient->send();
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata(): ClientMetadataInterface
    {
        $endpoint = $this->buildEndPoint();

        // Ensure endpoint is set when getting metadata
        $this->apiClient->withEndpoint($endpoint);

        return $this->apiClient->getMetadata();
    }

    /**
     * Resolve API client based on method requirements
     *
     * @param ApiClientResolver $clientResolver
     *
     * @return ClientInterface
     *
     * @throws InvalidClassNameException
     */
    private function resolveApiClient(ApiClientResolver $clientResolver): ClientInterface
    {
        $apiType = $this->getApiType();
        $format = $this->getRequestFormat();

        $client = $clientResolver->resolve($apiType, $format);

        if (!$client) {
            throw new InvalidClassNameException(sprintf('No suitable client found for API type: %s, format: %s', $apiType, $format));
        }

        return $client;
    }

    /**
     * Get API type for this method
     * Returns configured default from ace.method parameters or can be overridden by subclasses
     *
     * @return string
     */
    protected function getApiType(): string
    {
        try {
            $methodConfig = $this->parameterBag->get('ace.method');

            return $methodConfig['default_api_type'] ?? ClientInterface::API_TYPE_SOAP;
        } catch (\Exception $e) {
            return ClientInterface::API_TYPE_SOAP; // Fallback default
        }
    }

    /**
     * Get request format for this method
     * Returns configured default from ace.method parameters or can be overridden by subclasses
     *
     * @return string
     */
    protected function getRequestFormat(): string
    {
        try {
            $methodConfig = $this->parameterBag->get('ace.method');

            return $methodConfig['default_request_format'] ?? ClientInterface::FORMAT_XML;
        } catch (\Exception $e) {
            return ClientInterface::FORMAT_XML; // Fallback default
        }
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
            $mappings = $this->parameterBag->get('ace.request_response_mapping');

            return $mappings[$responseInterface]['response'] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function resolveResponseClassAutomatically(string $responseInterface): ?string
    {
        try {
            return $this->modelResolver->findResponseModel($responseInterface);
        } catch (\Exception $e) {
            return null;
        }
    }
}
