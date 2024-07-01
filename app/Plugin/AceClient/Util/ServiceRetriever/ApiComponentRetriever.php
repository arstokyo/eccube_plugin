<?php

namespace Plugin\AceClient\Util\ServiceRetriever;

use Plugin\AceClient\Util\Serializer\SoapXmlSerializerProvider;
use Plugin\AceClient\Util\Logger\LoggerProvider;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\Util\Normalizer\SoapXmlNormalizer;

/**
 * Retriver for ApiDelegate.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ApiComponentRetriever
{
    private SoapXmlSerializerProvider $SoapXmlSerializerProvider;
    private LoggerProvider $loggerProvider;
    private SoapXmlNormalizer $normalizer;

    /**
     * ApiComponentRetriever constructor.
     * 
     * @param SoapXmlSerializerProvider $SoapXmlSerializerProvider
     * @param LoggerProvider $loggerProvider
     * @param SoapXmlNormalizer $normalizer
     */
    public function __construct
    (
        SoapXmlSerializerProvider $SoapXmlSerializerProvider,
        LoggerProvider $loggerProvider,
        SoapXmlNormalizer $normalizer
    ) {
        $this->SoapXmlSerializerProvider = $SoapXmlSerializerProvider;
        $this->loggerProvider = $loggerProvider;
        $this->normalizer = $normalizer;
    }

    /**
     * Get SoapXml Provider.
     * 
     * @return SoapXmlSerializerProvider
     */
    public function getSoapXmlProvider(): SoapXmlSerializerProvider
    {
        return $this->SoapXmlSerializerProvider;
    }

    /**
     * Get Logger Provider.
     * 
     * @return LoggerProvider
     */
    public function getLoggerProvider(): LoggerProvider
    {
        return $this->loggerProvider;
    }

    /**
     * Get Normalizer
     * 
     * @return NormalizerInterface
     */
    public function getNormalizer(): NormalizerInterface
    {
        return $this->normalizer;
    }

}