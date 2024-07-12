<?php

namespace Plugin\AceClient43\Util\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;

/**
 * Factory for HttpClient.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class HttpClientFactory
{
    public const DEFAULT_BASE_URL = "http://localhost:8080/";
    public const DEFAULT_HEADER = ['User-Agent' => OverviewMapper::USER_AGENT_HEADER];
    public const DEFAULT_OPTIONS = ['timeout' => 600 , 'verify' => false];
    public const DEFAULT_HTTP_CLIENT = SoapXmlHttpClient::class;

    /**
     * Make Soap Xml Client
     * 
     * @return ClientInterface
     */
    public static function makeSoapHttpClient(array $config = []): ClientInterface
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