<?php

namespace Plugin\AceClient\Util\Encoder;

use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Util\ClassFactory\ClassFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

/**
 * Factory for Encoder.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class EncoderFactory
{
    const DEFAULT_ENCODER_FOR_SOAP_SERIALIZER = XmlEncoder::class;

    /**
     * Make Encoder by class name
     * 
     * @param string $className
     * 
     * @return EncoderInterface
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     * 
     */
    final public static function makeEncoderByClassName(string $className): EncoderInterface
    {
        return ClassFactory::makeClass($className, EncoderInterface::class);
    }
}