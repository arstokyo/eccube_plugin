<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

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
     * @return RequestModelInterface|\JsonSerializable|array<int|string, mixed>
     */
    public function getData(): RequestModelInterface|\JsonSerializable|array;
}