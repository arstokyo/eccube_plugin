<?php

namespace Plugin\AceClient\ApiClient;

use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Util\ClassFactory\ClassFactory;

/**
 * Factory for Api Client.
 * 
 * @author v.t.nguyen <v.t.nguyen@ar-system.co.jp>
 */
final class ApiClientFactory
{
    public const DEFAULT_API_CLIENT = \Plugin\AceClient\ApiClient\Api\Client\PostSoapXMLClient::class;

    /**
     * Make a new client instance.
     *
     * @param string $className
     * @param string $endpoint
     * @param DelegateInterface $delegate
     * 
     * @return ClientInterface
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     * 
     */
    public static function makeClient(string $className, string $endpoint, DelegateInterface $delegate): ClientInterface
    {
        return ClassFactory::makeClassArgs($className, ClientInterface::class, $endpoint, $delegate);
    }

}

