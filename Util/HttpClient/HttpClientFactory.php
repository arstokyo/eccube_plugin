<?php

namespace Plugin\AceClient\Util\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Util\ClassFactory\ClassFactory;

/**
 * Factory for HttpClient.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class HttpClientFactory
{
    public const DEFAULT_BASE_URL = "http://localhost:8008/";
    public const DEFAULT_HEADER = ['User-Agent' => OverviewMapper::USER_AGENT_HEADER];
    public const DEFAULT_OPTIONS = ['timeout' => 600 , 'verify' => false];

    public const DEFAULT_HTTP_CLIENT = SoapXmlApiClient::class;

    /**
     * Make Soap Xml Client
     * 
     * @return ClientInterface
     */
    public static function makeSoapXmlClient(array $config = []): ClientInterface
    {
        return new Client($config);
    }

    /**
     * Make HttpClient by class name.
     * 
     * @param string $className
     * @param array $options
     * 
     * @return ClientInterface
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    public static function makeHttpClientByClassName(string $className,array $options): ClientInterface
    {
        return ClassFactory::makeClassArgs($className, ClientInterface::class, $options);
    }

}