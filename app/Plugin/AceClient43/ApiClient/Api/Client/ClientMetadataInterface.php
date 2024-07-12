<?php

namespace Plugin\AceClient43\ApiClient\Api\Client;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface for ClientMetadata
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
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
    public function getData();
}