<?php

namespace Plugin\AceClient\ApiClient;

use Plugin\AceClient\ApiClient\Api\Client;

interface ApiClientInteface
{
    /**
     * Make GET client
     *
     * @param string $endpoint Target endpoint.
     *
     * @return Client\GetClientInterface
     */
    public function makeGetClient(string $endpoint): Client\GetClientInterface;

     /**
     * Make POST client
     *
     * @param string $endpoint Target endpoint.
     *
     * @return Client\PostClientInterface
     */
    public function makePostClient(string $endpoint): Client\PostClientInterface;
}
