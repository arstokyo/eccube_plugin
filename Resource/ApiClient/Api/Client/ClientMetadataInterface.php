<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

interface ClientMetadataInterface
{
     /**
     * Get client requestmethod
     *
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * Get client endpoint
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Get client request
     *
     * @return \JsonSerializable|array<int|string, mixed>
     */
    public function getData(): \JsonSerializable|array;
}