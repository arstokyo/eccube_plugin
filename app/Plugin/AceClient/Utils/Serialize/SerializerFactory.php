<?php

namespace Plugin\AceClient\Utils\Serialize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Plugin\AceClient\Utils\Normalize\NormalizerFactory;

final class SerializerFactory
{
    /**
     * Make Xml Serializer
     * 
     * @return Serializer
     */
    final public static function makeXmlSerializer(): SerializerInterface {
        return self::makeSerializer(NormalizerFactory::makeAnnotationNormalizers(), new XmlEncoder());
    }

    /**
     * Make Json Serializer
     * 
     * @return Serializer
     */
    final public static function makeJsonSerializer(): SerializerInterface {
        return self::makeSerializer(NormalizerFactory::makeAnnotationNormalizers(), new JsonEncoder());
    }

    final public static function makeDTOSerializer(): SerializerInterface {
        return self::makeSerializer(NormalizerFactory::makeRecursiveNormalizers(), new JsonEncoder());
    }

    /**
     * Make Serializer
     * 
     * @param EncoderInterface $encode
     * @return SerializerInterface
     */
    private static function makeSerializer(array $normalizers, EncoderInterface $encode): SerializerInterface
    {
        return new Serializer(normalizers: $normalizers, encoders: [$encode]);
    }
}
