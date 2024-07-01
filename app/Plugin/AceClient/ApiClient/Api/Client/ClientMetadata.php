<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * ClientMetadata
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ClientMetadata implements ClientMetadataInterface
{
    private string $requestmethod;
    private string $uri;
    private RequestModelInterface|\JsonSerializable|array $data;

     /**
     * ClientMetadata constructor
     *
     * @param string                                                           $requestmethod Client requestmethod to use.
     * @param string                                                           $uri           Client target URI.
     * @param RequestModelInterface|\JsonSerializable|array<int|string, mixed> $data          Client request data.
     */
    public function __construct
    (
        string $requestmethod,
        string $uri,
        RequestModelInterface|\JsonSerializable|array $data
    ) {
        $this->requestmethod = $requestmethod;
        $this->uri           = $uri;
        $this->data          = $data;
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
     * @return RequestModelInterface|\JsonSerializable|array<int|string, mixed>
     */
    public function getData(): RequestModelInterface|\JsonSerializable|array
    {
        return $this->data;
    }
}