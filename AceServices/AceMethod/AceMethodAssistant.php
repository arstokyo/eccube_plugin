<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\Config\Model\AceMethod\AceMethodDetailModel;
use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\ApiClient\Api\Delegate;
use Plugin\AceClient\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient\ApiClient\ApiClientFactory;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Plugin\AceClient\Utils\HttpClient\HttpClientFactory;

/**
 * Ace Method Assistant
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class AceMethodAssistant
{
    /**
     * @var AceMethodDetailModel $config
     */
    private AceMethodDetailModel $config;

    /**
     * Constructor
     *
     * @param AceMethodDetailModel $config
     */
    public function __construct(AceMethodDetailModel $config) 
    {
        $this->config = $config;
    }

    /**
     * Get the value of config
     * 
     * @return AceMethodDetailModel
     */
    public function getConfig(): AceMethodDetailModel
    {
        return $this->config;
    }

    /**
     * Build the delegate.
     * 
     * @return DelegateInterface
     */
    private function buildDelegate(): DelegateInterface
    {
        $normalizer = $this->buildNormalizer();
        return new Delegate($this->buildHttpClient(),
                            $this->buildSerializer([$normalizer]),
                            $normalizer,
                            $this->buildLogger());
    }

    /**
     * Build the api client.
     * 
     * @param string $endpoint
     * 
     * @return ClientInterface
     */
    public function buildApiClient(string $endpoint): ClientInterface
    {
        return ApiClientFactory::makeClient($this->config->getApiClient()->getClassName() ?: ApiClientFactory::DEFAULT_API_CLIENT,
                                            $endpoint,
                                            $this->buildDelegate(), 
                                           );

    }

    /**
     * Build the http client.
     * 
     * @return \GuzzleHttp\ClientInterface
     */
    private function buildHttpClient(): \GuzzleHttp\ClientInterface
    {
        return ClassFactory::makeClassArgs($this->config->getHttpClient()->getClassName() ?: ApiClientFactory::DEFAULT_HTTP_CLIENT,
                                           $this->buildOptionsForHttpClient());
    }

    /**
     * Build the options for http client.
     * 
     * @return array
     */
    private function buildOptionsForHttpClient(): array
    {
        return \array_merge(['headers' => $this->config->getHttpClient()->getHeaders() ?: HttpClientFactory::DEFAULT_HEADER,
                             'base_uri' => $this->config->getHttpClient()->getBaseUri() ?: HttpClientFactory::DEFAULT_BASE_URL,],
                             $this->config->getHttpClient()->getOptions() ?: HttpClientFactory::DEFAULT_OPTIONS);
    }

    /**
     * Build the serializer.
     * 
     * @param NormalizerInterface $normalizer
     * 
     * @return SerializerInterface
     */
    private function buildSerializer(array $normalizers): SerializerInterface
    {
        return ApiClientFactory::makeSerializer($this->config->getSerializer()->getClassName() ?: ApiClientFactory::DEFAULT_SERIALIZER,
                                                $normalizers,
                                                $this->buildEncoders());
    }

    /**
     * Build the encoder.
     * 
     * @return EncoderInterface[]
     */
    private function buildEncoders(): array
    {
        return [ClassFactory::makeClass($this->config->getSerializer()->getEncoder() ?: ApiClientFactory::DEFAULT_ENCODER)];
    }

    /**
     * Build the normalizer.
     * 
     * @return NormalizerInterface
     */
    private function buildNormalizer(): NormalizerInterface
    {
        return ApiClientFactory::makeNormalizer($this->config->getNormalizer()->getClassName() ?: ApiClientFactory::DEFAULT_NORMALIZER);
    }

    /**
     * Build the logger.
     * 
     * @return LoggerInterface
     */
    private function buildLogger(): LoggerInterface
    {   
        return ApiClientFactory::makeLogger($this->config->getLogger()->getClassName() ?: ApiClientFactory::DEFAULT_LOGGER);
    }

}