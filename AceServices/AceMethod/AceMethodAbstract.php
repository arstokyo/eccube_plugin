<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Util\ClassFactory\ClassFactory;
use Plugin\AceClient\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Abstract Class for Ace Method
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class AceMethodAbstract implements AceMethodInterface
{
    /**
     * @var AceMethodAssistant $assistant
     */
    protected AceMethodAssistant $assistant;

    /**
     * AceMethodAbstract Constructor
     *
     * @param string $baseServiceName
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct(string $baseServiceName, ServiceRetrieverInterface $serviceRetriever)
    {
        $this->initializeAssistant($baseServiceName, $serviceRetriever);
    }

    /**
     * Initialize Assistant
     * 
     * @param string $baseServiceName
     * @param ServiceRetrieverInterface $serviceRetriever
     * 
     * @return void
     */
    public function initializeAssistant(string $baseServiceName, ServiceRetrieverInterface $serviceRetriever): void
    {
        $this->assistant = new AceMethodAssistant(\get_class($this), self::buildEndPoint($baseServiceName), $serviceRetriever);
        $this->assistant->getApiClient()->withResponseAs(self::getResponseAsObject());
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
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
     private function getResponseAsObject(): string
     {
        $settedResponseObject = $this->setResponseAsObject();
        ClassFactory::validateClassExists($settedResponseObject);
        
        return ClassFactory::validateCompatible($settedResponseObject, ResponseModelInterface::class);
     }

}