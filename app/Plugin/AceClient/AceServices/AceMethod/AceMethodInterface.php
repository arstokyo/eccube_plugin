<?php

namespace Plugin\AceClient43\AceServices\AceMethod;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\ApiClient;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Interface for Ace Method
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AceMethodInterface
{
    /**
     * Set the Request.
     *
     * @param Request\RequestModelInterface $requestModel
     * @throws MissingRequestParameterException
     * @return self
     */
    public function withRequest(Request\RequestModelInterface $requestModel): self;

    /**
     * Send the Request.
     *
     * @return ApiClient\Response\ResponseInterface
     */
    public function send(): ResponseInterface;

    /**
     * Get the Metadata.
     *
     * @return ApiClient\Api\Client\ClientMetadataInterface
     */
    public function getMetadata(): ClientMetadataInterface;

}