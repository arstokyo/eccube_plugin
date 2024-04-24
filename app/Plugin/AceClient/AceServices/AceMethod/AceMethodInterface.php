<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;
use Plugin\AceClient\ApiClient;

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
     * @return AceMethodInterface
     */
    public function withRequest(RequestModelInterface $request): self;

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