<?php

namespace Plugin\AceClient\APiClient\Api;

use Plugin\AceClient\ApiClient\Api\ClientMetadataInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;
use Plugin\AceClient\Exception;

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
     * @param \JsonSerializable|array<int|string, mixed> $request Client request.
     *
     * @return ClientInterface
     */
    public function withRequest(\JsonSerializable|array $request): ClientInterface;

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