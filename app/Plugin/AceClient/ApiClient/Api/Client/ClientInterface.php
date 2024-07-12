<?php

namespace Plugin\AceClient43\ApiClient\Api\Client;

use Plugin\AceClient43\ApiClient\Api\Client\ClientMetadataInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Exception;

/**
 * Interface for Client
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ClientInterface
{
     /**
     * Get client getMetadata
     *
     * @return ClientMetadataInterface
     */
    public function getMetadata(): ClientMetadataInterface;

    /**
     * Set client headers
     *
     * @param array<string, string[]> $headers Client headers.
     *
     * @return ClientInterface
     */
    public function withHeaders(array $headers): ClientInterface;

    /**
     * Set client request
     *
     * @param RequestModelInterface|\JsonSerializable|array<int|string, mixed> $request Client request.
     *
     * @return ClientInterface
     */
    public function withRequest($request): ClientInterface;

    /**
     * Set client response as
     *
     * @param class-string $object Class of the client response.
     *
     * @return ClientInterface
     */
    public function withResponseAs(string $object): ClientInterface;

    /**
     * Send client request
     *
     * @throws Exception\AceClientBaseException
     *
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;
}