<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\Exception\NotCompatibleDataType;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceCLient\Utils\ClassFactory\ClassFactory;
use Plugin\AceClient\Exception\RequestParameterNullException;

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
     */
    public function __construct(string $baseServiceName)
    {
        $this->assistant = new AceMethodAssistant($this::class, self::buildEndPoint($baseServiceName));
        $this->assistant->getApiClient()->withResponseAs(self::getResponseAsObject());
    }

    /**
     * Set the Request.
     *
     * @param RequestModelInterface
     * @return AceMethodAbstract
     * @throws RequestParameterNullException
     */
    public function withRequest(RequestModelInterface $request): self
    {
        if (!$request->ensureValidParameters()) {
            throw new RequestParameterNullException(sprintf('Not nullable parameters are null. Request Object: %s', get_class($request)));
        };
        $this->assistant->getApiClient()->withRequest($request);
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     */
    public function send(): ResponseInterface
    {
        return $this->assistant->getApiClient()->send();
    }

    /**
     * {@inheritDoc}
     *
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
     * @throws NotCompatibleDataType
     * @throws InvalidClassNameException
     */
     private function getResponseAsObject(): string
     {
        $settedResponseObject = $this->setResponseAsObject();
        ClassFactory::validateClassExists($settedResponseObject);
        return ClassFactory::validateCompatible($settedResponseObject, ResponseModelInterface::class);
     }

}