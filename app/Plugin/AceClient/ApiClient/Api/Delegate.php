<?php

namespace Plugin\AceClient\ApiClient\Api;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer;
use Symfony\Component\Serializer\Normalizer;

/**
 * Delegate For Api Client
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class Delegate implements DelegateInterface
{
    private ClientInterface $httpClient;
    private Serializer\SerializerInterface $serializer;
    private Normalizer\NormalizerInterface $normalizer;
    private LoggerInterface $logger;

   /**
     * Abstract Delegate constructor
     *
     * @param ClientInterface                $httpClient Http client instance.
     * @param Serializer\SerializerInterface $serializer Serializer instance.
     * @param Normalizer\NormalizerInterface $normalizer Normalizer instance.
     * @param LoggerInterface                $logger     Logger instance.
     */
    public function __construct
    (
        ClientInterface $httpClient,
        Serializer\SerializerInterface $serializer,
        Normalizer\NormalizerInterface $normalizer,
        LoggerInterface $logger
    ) {
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
        $this->normalizer = $normalizer;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializer(): Serializer\SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getNormalizer(): Normalizer\NormalizerInterface
    {
        return $this->normalizer;
    }

    /**
     * {@inheritDoc}
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}