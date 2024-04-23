<?php

namespace Plugin\AceClient\Utils\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;

/**
 * Factory for HttpClient.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class HttpClientFactory
{
    public const DEFAULT_BASE_URL = "http://localhost/";
    public const DEFAULT_HEADER = ['User-Agent' => OverviewMapper::ACE_CLIENT_FULL_NAME];
    public const DEFAULT_OPTIONS = ['timeout' => 600 , 'verify' => false];

    /**
     * Make Soap Xml Client
     * 
     * @return ClientInterface
     */
    final public static function makeSoapXmlClient(array $config = []): ClientInterface
    {
        return new Client($config);
    }
}