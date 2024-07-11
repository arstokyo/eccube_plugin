<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\AceConfig\Model\AceMethod\AceMethodDetailModel;
use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\ApiClient\Api\Delegate;
use Plugin\AceClient\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient\ApiClient\ApiClientFactory;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Plugin\AceClient\Util\HttpClient\HttpClientFactory;
use Plugin\AceClient\Util\Encoder\EncoderFactory;
use Plugin\AceClient\Util\Logger\LoggerFactory;
use Plugin\AceClient\Util\Serializer\SerializerFactory;
use Plugin\AceClient\Util\Normalizer\NormalizerFactory;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\InvalidFuncNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Util\ConfigLoader\AceMethodConfigLoaderTrait;
use Plugin\AceClient\Util\ServiceRetriever\ServiceRetrieverInterface;
use Plugin\AceClient\Util\ConfigBuilder\AceMethodConfigBuilder;

/**
 * Ace Method Assistant
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class AceMethodAssistant implements AceMethodAssistantInterface
{
    use AceMethodConfigLoaderTrait;

    /**
     * @var AceMethodDetailModel $config
     */
    private AceMethodDetailModel $config;

    /**
     * @var ClientInterface $apiClient
     */
    private ClientInterface $apiClient;

    /**
     * @var ServiceRetrieverInterface $serviceRetriever
     */
    private ServiceRetrieverInterface $serviceRetriever;

    /**
     * Ace Method Assistant Constructor.
     *
     * @param string $currentClassName
     * @param string $endPoint
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct(string $currentClassName, string $endPoint , ServiceRetrieverInterface $serviceRetriever) 
    {
        $this->serviceRetriever = $serviceRetriever;
        $this->config = $this->loadConfig($this->serviceRetriever->getAceConfigSerializer(), AceMethodConfigBuilder::class, $this->serviceRetriever->getConfigRepository())
                             ->getOverridedConfig($currentClassName);
        $this->apiClient = $this->buildApiClient($endPoint);
    }

    /**
     * {@inheritdoc}
     */
    public function getApiClient(): ClientInterface
    {
        return $this->apiClient;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig(): AceMethodDetailModel
    {
        return $this->config;
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceRetriever(): ServiceRetrieverInterface
    {
        return $this->serviceRetriever;
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
     * @throws DataTypeMissMatchException
     * 
     */
    private function buildHttpClient(): \GuzzleHttp\ClientInterface
    {
        return HttpClientFactory::makeHttpClientByClassName($this->config->getHttpClient()->getClassName() ?: HttpClientFactory::DEFAULT_HTTP_CLIENT,
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
        if ((empty($this->config->getSerializer()->getClassName()) ? true : SerializerFactory::DEFAULT_SERIALIZER === $this->config->getSerializer()->getClassName()) &&
            (empty($this->config->getSerializer()->getEncoder()) ? true : EncoderFactory::DEFAULT_ENCODER_FOR_SOAP_SERIALIZER === $this->config->getSerializer()->getEncoder()) &&
            (empty($this->config->getSerializer()->getNormalizers()) ? true : NormalizerFactory::DEFAULT_NORMALIZERS_FOR_SOAP_SERIALIZER === $this->config->getSerializer()->getNormalizers())
        ) {
            return $this->serviceRetriever->getSoapXmlProvider()->getSoapXmlSerializer();
        }

        return SerializerFactory::makeSerilizerByClassName($this->config->getSerializer()->getClassName() ?: SerializerFactory::DEFAULT_SERIALIZER,
                                                           $this->buildNormalizersForSerializer(),
                                                           $this->buildEncoders(),
                                                           $this->serviceRetriever->getAceConfigSerializer(),
                                                         );
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
        if (empty($this->config->getSerializer()->getNormalizers()) ||
            NormalizerFactory::DEFAULT_NORMALIZERS_FOR_SOAP_SERIALIZER === $this->config->getSerializer()->getNormalizers()
        ) {
            return $this->serviceRetriever->getSoapXmlProvider()->getNormalizers();
        }

        $callfuncSuffix = $this->config->getSerializer()->getNormalizers();
        return NormalizerFactory::makeNormalizerByFuncNameSuffix($callfuncSuffix);
    }

    /**
     * Build the encoder.
     * 
     * @return EncoderInterface[]
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    private function buildEncoders(): array
    {
        if (empty($this->config->getSerializer()->getEncoder()) ||
            EncoderFactory::DEFAULT_ENCODER_FOR_SOAP_SERIALIZER === $this->config->getSerializer()->getEncoder()
        ) {
            return $this->serviceRetriever->getSoapXmlProvider()->getEncoders();
        }

        return [EncoderFactory::makeEncoderByClassName($this->config->getSerializer()->getEncoder())];
    }

    /**
     * Build the normalizer.
     * 
     * @return NormalizerInterface
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    private function buildNormalizer(): NormalizerInterface
    {
        if (empty($this->config->getNormalizer()->getClassName()) ||
            NormalizerFactory::DEFAULT_NORMALIZER === $this->config->getNormalizer()->getClassName()
        ) {
            return $this->serviceRetriever->getNormalizer();
        }

        return NormalizerFactory::makeNormalizerByClassName($this->config->getNormalizer()->getClassName());
    }

    /**
     * Build the logger.
     * 
     * @return LoggerInterface
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    private function buildLogger(): LoggerInterface
    {   
        if (empty($this->config->getLogger()->getClassName()) || 
            LoggerFactory::DEFAUT_LOGGER_CLASS === $this->config->getLogger()->getClassName()
        ) {
            return $this->serviceRetriever->getLoggerProvider()->getLogger();
        } elseif (LoggerFactory::NULL_LOGGER_CLASS === $this->config->getLogger()->getClassName()) {
            return $this->serviceRetriever->getLoggerProvider()->getNullLogger();
        }

        return LoggerFactory::makeLoggerByClassName($this->config->getLogger()->getClassName());
    }

}