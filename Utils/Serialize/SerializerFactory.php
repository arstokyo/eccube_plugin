<?php

namespace Plugin\AceClient\Utils\Serialize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Plugin\AceClient\Utils\Normalize\NormalizerFactory;

class SerializerFactory
{
    /**
     * Make Xml Serializer
     * 
     * @return Serializer
     */
    public static function makeXmlSerializer(): SerializerInterface {
        return self::makeSerializer(new XmlEncoder());
    }

    /**
     * Make Json Serializer
     * 
     * @return Serializer
     */
    public static function makeJsonSerializer(): SerializerInterface {
        return self::makeSerializer(new JsonEncoder());
    }

    /**
     * Make Serializer
     * 
     * @param EncoderInterface $encode
     * @return SerializerInterface
     */
    private static function makeSerializer(EncoderInterface $encode): SerializerInterface
    {
        return new Serializer(normalizers: NormalizerFactory::makeAnnotationNormalizers(), encoders: [$encode]);
    }
}
