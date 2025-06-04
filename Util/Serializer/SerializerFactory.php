<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\Serializer;

use Plugin\AceClient43\AceConfig\Model\SoapXmlSerializer\SoapXmlSerializerModel;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Plugin\AceClient43\Util\Denormalizer\DenormalizerFactory;
use Plugin\AceClient43\Util\Normalizer\NormalizerFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

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
     * @return SoapXmlSerializer
     */
    public static function makeSoapSerializerForTest(): SoapXmlSerializer
    {
        return new SoapXmlSerializer(NormalizerFactory::makeDefaultSoapNormalizers(), [new XmlEncoder()], new AceConfigSerializer());
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
        return self::makeSerializer(array_merge(NormalizerFactory::makeDTONormalizers(), [DenormalizerFactory::makeArrayDenormalizer()]), [new JsonEncoder()]);
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
        return new Serializer($normalizers, $encode);
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
