<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Eccube\Doctrine\ORM\Query\Normalize;
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
use Plugin\AceClient\Utils\Encoder\EncoderFactory;
use Plugin\AceClient\Utils\Log\LoggerFactory;
use Plugin\AceClient\Utils\Serialize\SerializerFactory;
use Plugin\AceClient\Utils\Normalize\NormalizerFactory;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\InvalidFuncNameException;
use Plugin\AceClient\Exception\NotCompatibleDataType;

/**
 * Ace Method Assistant
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class AceMethodAssistant implements AceMethodAssistantInterface
{
    /**
     * @var AceMethodDetailModel $config
     */
    private AceMethodDetailModel $config;

        /**
     * @var ClientInterface $apiClient
     */
    protected ClientInterface $apiClient;

    /**
     * Ace Method Assistant Constructor.
     *
     * @param AceMethodDetailModel $config
     * @param string $endPoint
     */
    public function __construct(AceMethodDetailModel $config, string $endPoint) 
    {
        $this->config = $config;
        $this->apiClient = $this->buildApiClient($endPoint);
    }

        /**
     * Get the Api Client.
     * 
     * @return ClientInterface
     */
    public function getApiClient(): ClientInterface
    {
        return $this->apiClient;
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
     * Build the api client.
     * 
     * @param string $endpoint
     * 
     * @return ClientInterface
     */
    private function buildApiClient(string $endpoint): ClientInterface
    {
        return ApiClientFactory::makeClient($this->config->getApiClient()->getClassName() ?: ApiClientFactory::DEFAULT_API_CLIENT,
                                            $endpoint,
                                            $this->buildDelegate(), 
                                            );

    }

    /**
     * Build the delegate.
     * 
     * @return DelegateInterface
     */
    private function buildDelegate(): DelegateInterface
    {
        return new Delegate($this->buildHttpClient(),
                            $this->buildSerializer(),
                            $this->buildNormalizer(),
                            $this->buildLogger());
    }

    /**
     * Build the http client.
     * 
     * @return \GuzzleHttp\ClientInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     * 
     */
    private function buildHttpClient(): \GuzzleHttp\ClientInterface
    {
        return HttpClientFactory::makeHttpClientByClassName($this->config->getHttpClient()->getClassName() ?: ApiClientFactory::DEFAULT_HTTP_CLIENT,
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
                             $this->config->getHttpClient()->getOptions() ?? HttpClientFactory::DEFAULT_OPTIONS);
    }

    /**
     * Build the serializer.
     * 
     * @param NormalizerInterface $normalizer
     * 
     * @return SerializerInterface
     */
    private function buildSerializer(): SerializerInterface
    {

        return SerializerFactory::makeSerilizerByClassName($this->config->getSerializer()->getClassName() ?: ApiClientFactory::DEFAULT_SERIALIZER,
                                                           $this->buildNormalizersForSerializer(),
                                                           $this->buildEncoders());
    }

    /**
     * Build the normalizers for serializer.
     * 
     * @return array
     * 
     * @throws InvalidFuncNameException
     */
    private function buildNormalizersForSerializer(): array
    {
        $callfuncSuffix = $this->config->getSerializer()->getNormalizers() ?: ApiClientFactory::DEFAULT_NORMALIZERS_FOR_SERIALIZER;
        return NormalizerFactory::makeNormalizerByFuncNameSuffix($callfuncSuffix);
    }

    /**
     * Build the encoder.
     * 
     * @return EncoderInterface[]
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     */
    private function buildEncoders(): array
    {
        return [EncoderFactory::makeEncoderByClassName($this->config->getSerializer()->getEncoder() ?: ApiClientFactory::DEFAULT_ENCODER)];
    }

    /**
     * Build the normalizer.
     * 
     * @return NormalizerInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     */
    private function buildNormalizer(): NormalizerInterface
    {
        return NormalizerFactory::makeNormalizerByClassName($this->config->getNormalizer()->getClassName() ?: ApiClientFactory::DEFAULT_NORMALIZER);
    }

    /**
     * Build the logger.
     * 
     * @return LoggerInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     */
    private function buildLogger(): LoggerInterface
    {   
        return LoggerFactory::makeLoggerByClassName($this->config->getLogger()->getClassName() ?: ApiClientFactory::DEFAULT_LOGGER);
    }

}