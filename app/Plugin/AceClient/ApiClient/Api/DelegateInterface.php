<?php

namespace Plugin\AceClient\ApiClient\Api;

use GuzzleHttp\ClientInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

interface DelegateInterface
{
    /**
     * Get the HTTP client instance
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface;

    /**
     * Get the serializer instance
     *
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface;

    /**
     * Get the normalizer instance
     *
     * @return NormalizerInterface
     */
    public function getNormalizer(): NormalizerInterface;
    /**
     * Get the logger instance
     *
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

}