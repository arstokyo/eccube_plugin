<?php

namespace Plugin\AceClient\Utils\Serialize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\Utils\Normalize\NormalizerFactory;
use Plugin\AceClient\Utils\Denormalize\DenormalizerFactory;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\NotCompatibleDataType;
use Plugin\AceClient\Utils\Serialize;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;

/**
 * Factory for Serializer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class SerializerFactory
{
    /**
     * Make Xml Serializer
     * 
     * @return Serializer
     */
    public static function makeXmlSerializer(): SerializerInterface {
        return self::makeSerializer(NormalizerFactory::makeAnnotationNormalizers(), [new XmlEncoder()]);
    }

    /**
     * Make Soap Serializer For Test
     * 
     * @return Serialize\SoapXMLSerializer
     */
    public static function makeSoapSerializerForTest(): Serialize\SoapXMLSerializer {
        return new Serialize\SoapXMLSerializer(NormalizerFactory::makeRecursiveNormalizers(), [new XmlEncoder()]);
    }

    /**
     * Make Json Serializer
     * 
     * @return Serializer
     */
    public static function makeJsonSerializer(): SerializerInterface {
        return self::makeSerializer(NormalizerFactory::makeAnnotationNormalizers(), [new JsonEncoder()]);
    }

    public static function makeDTOSerializer(): SerializerInterface {
        return self::makeSerializer(array_merge(NormalizerFactory::makeRecursiveNormalizers(),[DenormalizerFactory::makeArrayDenormalizer()]), [new JsonEncoder()]);
    }

    /**
     * Make Serializer
     * 
     * @param NormalizerInterface[] $normalizers
     * @param EncoderInterface[] $encode
     * 
     * @return SerializerInterface
     */
    public static function makeSerializer(array $normalizers, array $encode): SerializerInterface
    {
        return new Serializer(normalizers: $normalizers, encoders: $encode);
    }

    /**
     * Make Serializer by class name
     * 
     * @param string $className
     * @param NormalizerInterface[] $normalizers
     * @param EncoderInterface[] $encoders
     * 
     * @return SerializerInterface
     * 
     * @throws InvalidClassNameException
     * @throws NotCompatibleDataType
     */
    public static function makeSerilizerByClassName(string $className, array $normalizers, array $encoders): SerializerInterface
    {
        return ClassFactory::makeClassArgs($className, SerializerInterface::class, $normalizers, $encoders);
    }
}
