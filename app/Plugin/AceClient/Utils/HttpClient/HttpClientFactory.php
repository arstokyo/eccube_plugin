<?php

namespace Plugin\AceClient\Utils\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;

/**
 * Factory for HttpClient.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class HttpClientFactory
{
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