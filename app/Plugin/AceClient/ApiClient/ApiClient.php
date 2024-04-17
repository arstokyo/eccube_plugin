<?php

namespace Plugin\AceClient\ApiClient;

use Plugin\AceClient\ApiClient\Delegate;
use Plugin\AceClient\ApiClient\Api\Client;
use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiClient implements ApiClientInteface
{
    private Delegate $delegate;

    /**
     * ApiClient constructor
     *
     * @param ClientInterface     $httpClient Http client instance.
     * @param SerializerInterface $serializer Serializer instance.
     * @param NormalizerInterface $normalizer Normalizer instance.
     * @param LoggerInterface     $logger     Logger instance.
     */
    public function __construct(
        ClientInterface $httpClient,
        SerializerInterface $serializer,
        NormalizerInterface $normalizer,
        LoggerInterface $logger
    ) {
        $this->delegate = new Delegate($httpClient, $serializer, $normalizer, $logger);
    }

    /**
     * Make Get Client
     *
     * @param string $endpoint Target endpoint.
     *
     * @return Client\GetClientInterface
     */
    public function makeGetClient(string $endpoint): Client\GetClientInterface
    {
        return new Client\GetClient($endpoint, $this->delegate);
    }

    /**
     * Make Post Client
     *
     * @param string $endpoint Target endpoint.
     *
     * @return Client\PostClientInterface
     */
    public function makePostClient(string $endpoint): Client\PostClientInterface
    {
        return new Client\PostClient($endpoint, $this->delegate);
    }

}