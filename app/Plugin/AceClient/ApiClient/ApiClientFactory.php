<?php

namespace Plugin\AceClient\ApiClient;

use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\NotCompatibleDataType;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;

/**
 * Factory for Api Client.
 * 
 * @author v.t.nguyen <v.t.nguyen@ar-system.co.jp>
 */
final class ApiClientFactory
{
    
    public const DEFAULT_HTTP_CLIENT = 'Plugin\AceClient\Utils\HttpClient\SoapXmlApiClient';
    public const DEFAULT_NORMALIZER = 'Plugin\AceClient\Utils\Normalize\SoapXMLNormalizer';
    public const DEFAULT_NORMALIZERS_FOR_SERIALIZER = 'RecursiveNormalizers';
    public const DEFAULT_SERIALIZER = 'Plugin\AceClient\Utils\Serialize\SoapXMLSerializer';
    public const DEFAULT_LOGGER = 'Plugin\AceClient\Utils\Log\SoapXmlLogger';
    public const DEFAULT_API_CLIENT = 'Plugin\AceClient\ApiClient\Api\Client\PostSoapXMLClient';
    public const DEFAULT_ENCODER = 'Symfony\Component\Serializer\Encoder\XmlEncoder';

    /**
     * Make a new client instance.
     *
     * @param string $className
     * @param string $endpoint
     * 
     * @return ClientInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     * 
     */
    public static function makeClient(string $className, string $endpoint, DelegateInterface $delegate): ClientInterface
    {
        return ClassFactory::makeClassArgs($className, ClientInterface::class, $endpoint, $delegate);
    }

}

