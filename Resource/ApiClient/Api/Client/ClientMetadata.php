<?php

namespace Plugin\AceClient\ApiClient\Api;

class ClientMetadata implements ClientMetadataInterface
{
     /**
     * ClientMetadata constructor
     *
     * @param string                                     $requestmethod Client requestmethod to use.
     * @param string                                     $uri           Client target URI.
     * @param \JsonSerializable|array<int|string, mixed> $data          Client request data.
     */
    public function __construct(
        private string $requestmethod,
        private string $uri,
        private \JsonSerializable|array $data
    ) {
    }

    /**
     * Get Client Request method
     *
     * @return string
     */
    public function getRequestMethod(): string
    {
        return $this->requestmethod;
    }

    /**
     * Get Client get target Uri
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Get Client Request Data
     *
     * @return \JsonSerializable|array<int|string, mixed>
     */
    public function getData(): \JsonSerializable|array
    {
        return $this->data;
    }
}