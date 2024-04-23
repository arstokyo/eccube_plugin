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
   /**
     * Abstract Delegate constructor
     *
     * @param ClientInterface                $httpClient Http client instance.
     * @param Serializer\SerializerInterface $serializer Serializer instance.
     * @param Normalizer\NormalizerInterface $normalizer Normalizer instance.
     * @param LoggerInterface                $logger     Logger instance.
     */
    public function __construct(
        protected ClientInterface $httpClient,
        protected Serializer\SerializerInterface $serializer,
        protected Normalizer\NormalizerInterface $normalizer,
        protected LoggerInterface $logger
    ) {
    }

    /**
     * Get the HTTP client instance
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Get the serializer instance
     *
     * @return Serializer\SerializerInterface
     */
    public function getSerializer(): Serializer\SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * Get the normalizer instance
     *
     * @return Normalizer\NormalizerInterface
     */
    public function getNormalizer(): Normalizer\NormalizerInterface
    {
        return $this->normalizer;
    }

    /**
     * Get the logger instance
     *
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}