<?php

namespace Plugin\AceClient\ApiClient\Api;

use GuzzleHttp\ClientInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

/**
 * Interface For Api Client Delegate
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
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