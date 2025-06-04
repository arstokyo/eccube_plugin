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

namespace Plugin\AceClient43\Util\Encoder;

use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

/**
 * Factory for Encoder.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class EncoderFactory
{
    public const DEFAULT_ENCODER_FOR_SOAP_SERIALIZER = XmlEncoder::class;

    /**
     * Make Encoder by class name
     *
     * @param string $className
     *
     * @return EncoderInterface
     *
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    final public static function makeEncoderByClassName(string $className): EncoderInterface
    {
        return ClassFactory::makeClass($className, EncoderInterface::class);
    }
}
