<?php

namespace Plugin\AceClient\Utils\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\NotCompatibleDataType;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;

/**
 * Factory for HttpClient.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class HttpClientFactory
{
    public const DEFAULT_BASE_URL = "http://localhost/";
    public const DEFAULT_HEADER = ['User-Agent' => OverviewMapper::USER_AGENT_HEADER];
    public const DEFAULT_OPTIONS = ['timeout' => 600 , 'verify' => false];

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
     * @throws NotCompatibleDataType
     */
    public static function makeHttpClientByClassName(string $className,array $options): ClientInterface
    {
        return ClassFactory::makeClassArgs($className, ClientInterface::class, $options);
    }

}