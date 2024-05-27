<?php

namespace Plugin\AceClient\Util\Serializer;

use Plugin\AceClient\AceConfig\Model\SoapXmlSerializer\SoapXmlSerializerModel;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\Util\Normalizer\NormalizerFactory;
use Plugin\AceClient\Util\Denormalizer\DenormalizerFactory;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Util\Serializer as AceSerializer;
use Plugin\AceClient\Util\ClassFactory\ClassFactory;

/**
 * Factory for Serializer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class SerializerFactory
{

    public const DEFAULT_SERIALIZER = SoapXmlSerializerModel::class;

    /**
     * Make Xml Serializer
     * 
     * @return Serializer
     */
    public static function makeXmlSerializer(): SerializerInterface 
    {
        return self::makeSerializer(NormalizerFactory::makeAnnotationNormalizers(), [new XmlEncoder()]);
    }

    /**
     * Make Soap Serializer For Test
     * 
     * @return AceSerializer\SoapXmlSerializer
     */
    public static function makeSoapSerializerForTest(): AceSerializer\SoapXmlSerializer 
    {
        return new AceSerializer\SoapXmlSerializer(NormalizerFactory::makeDefaultSoapNormalizers(), [new XmlEncoder()], new AceConfigSerializer());
    }

    /**
     * Make Json Serializer
     * 
     * @return Serializer
     */
    public static function makeJsonSerializer(): SerializerInterface 
    {
        return self::makeSerializer(NormalizerFactory::makeAnnotationNormalizers(), [new JsonEncoder()]);
    }

    public static function makeDTOSerializer(): SerializerInterface 
    {
        return self::makeSerializer(array_merge(NormalizerFactory::makeDTONormalizers(),[DenormalizerFactory::makeArrayDenormalizer()]), [new JsonEncoder()]);
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
     * @throws DataTypeMissMatchException
     */
    public static function makeSerilizerByClassName(string $className, array $normalizers, array $encoders, ...$arg): SerializerInterface
    {
        return ClassFactory::makeClassArgs($className, SerializerInterface::class, $normalizers, $encoders, ...$arg);
    }
}
