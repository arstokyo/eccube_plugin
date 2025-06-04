<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\ServiceRetriever;

use Plugin\AceClient43\Util\Logger\LoggerProvider;
use Plugin\AceClient43\Util\Normalizer\SoapXmlNormalizer;
use Plugin\AceClient43\Util\Serializer\SoapXmlSerializerProvider;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

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
    public function __construct(
        SoapXmlSerializerProvider $SoapXmlSerializerProvider,
        LoggerProvider $loggerProvider,
        SoapXmlNormalizer $normalizer,
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
