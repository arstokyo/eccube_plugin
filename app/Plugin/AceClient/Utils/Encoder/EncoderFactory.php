<?php

namespace Plugin\AceClient\Utils\Encoder;

use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

/**
 * Factory for Encoder.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class EncoderFactory
{
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