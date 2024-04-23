<?php

namespace Plugin\AceClient\ApiClient;

use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\ApiClient\Api\client\ClientInterface;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\NotCompatibleDataType;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

/**
 * Factory for Api Client.
 * 
 * @author v.t.nguyen <v.t.nguyen@ar-system.co.jp>
 */
class ApiClientFactory
{

    public const DEFAULT_HTTP_CLIENT = 'Plugin\AceClient\Utils\HttpClient\SoapXmlApiClient';
    public const DEFAULT_NORMALIZER = 'Plugin\AceClient\Utils\Normalize\SoapXMLNormalizer';
    public const DEFAULT_NORMALIZERS_FOR_SERIALIZER = 'AnnotationNormalizers';
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
        $obj = ClassFactory::makeClassArgs($className, $endpoint, $delegate);
        return self::validateCompatible($obj, ClientInterface::class);
    }

    /**
     * Validate the object is compatible with the target interface.
     * 
     * @param mixed  $obj
     * @param string $datatype
     * 
     * @return object
     * @throws NotCompatibleDataType
     */
    private static function validateCompatible($obj, string $targetInterface): object
    {
        $interfaces = class_implements($obj);
        if (!(in_array($targetInterface, $interfaces, true) || is_subclass_of($obj, $targetInterface))){
            throw new NotCompatibleDataType(sprintf('Given object is not compatible with %s. Given object %s', $targetInterface, get_class($obj)));
        };
        return $obj;
    }


    /**
     * Make a new delegate instance.
     *
     * @param string $className
     * @param array $options
     * 
     * @return GuzzleClientInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     * 
     */
    public static function makeHttpClient(string $className, $options): GuzzleClientInterface
    {
        $obj = ClassFactory::makeClassArgs($className, $options);
        return self::validateCompatible($obj, GuzzleClientInterface::class);
    }

    /**
     * Make a new normalizer instance.
     *
     * @param string $className
     * 
     * @return NormalizerInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     * 
     */
    public static function makeNormalizer(string $className): NormalizerInterface
    {
        $obj = ClassFactory::makeClass($className);
        return self::validateCompatible($obj, NormalizerInterface::class);
    }

    /**
     * Make a new serializer instance.
     *
     * @param string $className
     * @param NormalizerInterface[] $normalizer
     * @param EncoderInterface[] $encoder
     * 
     * @return SerializerInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     * 
     */
    public static function makeSerializer(string $className, array $normalizers,array $encoder): SerializerInterface
    {
        $obj = ClassFactory::makeClassArgs($className, $normalizers, $encoder);
        return self::validateCompatible($obj, SerializerInterface::class);
    }

    /**
     * Make a new logger instance.
     *
     * @param string $className
     * 
     * @return LoggerInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     * 
     */
    public static function makeLogger(string $className): LoggerInterface
    {
        $obj = ClassFactory::makeClass($className);
        return self::validateCompatible($obj, LoggerInterface::class);
    }

}

