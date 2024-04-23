<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;
use Plugin\AceClient\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient\Utils\ConfigLoader\AceMethodConfigLoaderTrait;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\Exception\NotCompatibleDataType;
use Plugin\AceClient\Exception\InvalidClassNameException;

/**
 * Abstract Class for Ace Method
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class AceMethodAbstract implements AceMethodInterface
{
    use AceMethodConfigLoaderTrait;

    /**
     * @var AceMethodAssistant $assistant
     */
    protected AceMethodAssistant $assistant;

    /**
     * @var ClientInterface $apiClient
     */
    protected ClientInterface $apiClient;

    /**
     * Constructor
     *
     * @param string $baseServiceName
     */
    public function __construct(string $baseServiceName)
    {
        $this->assistant = new AceMethodAssistant($this->loadConfig()->getOverridedConfig($this::class));
        $this->apiClient = $this->assistant->buildApiClient(self::buildEndPoint($baseServiceName), 
                                                            self::getResponseAsObject());
    }

    /**
     * Set the Request.
     *
     * @param RequestModelInterface
     * @return AceMethodAbstract
     */
    public function withRequest(RequestModelInterface $request): self
    {
        $this->apiClient->withRequest($request);
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     */
    public function send(): ResponseInterface
    {
        return $this->apiClient->send();
    }

    /**
     * {@inheritDoc}
     *
     */
    public function getMetadata(): ClientMetadataInterface
    {
        return $this->apiClient->getMetadata();
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

    /**
     * Set the response object.
     * 
     * @return string
     */
    abstract protected function setResponseAsObject(): string;

    /**
     * Get the response object.
     * 
     * @return string
     * 
     * @throws NotCompatibleDataType
     * @throws InvalidClassNameException
     */
     private function getResponseAsObject(): string
     {
        $settedResponseObject = $this->setResponseAsObject();
        if (!class_exists($settedResponseObject)) { 
            throw new InvalidClassNameException(sprintf('Given class name does not exist. Given class name %s', $settedResponseObject));
        }
        $interfaces = class_implements($settedResponseObject);
        if (!($interfaces && in_array(ResponseModelInterface::class, $interfaces, true))) {
            throw new NotCompatibleDataType(sprintf('Given response object is not compatible with ResponseModelInterface. Given object %s', $settedResponseObject));
        }
        return $settedResponseObject;
     }

}