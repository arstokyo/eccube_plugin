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

namespace Plugin\AceClient43\Util\Logger;

use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class LoggerFactory
{
    public const DEFAUT_LOGGER_CLASS = SoapXmlLogger::class;

    public const NULL_LOGGER_CLASS = NullLogger::class;

    public const DEFAULT_LOG_ON = true;

    /**
     * Make a new logger instance.
     *
     * @param string $className
     *
     * @return LoggerInterface
     *
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    public static function makeLoggerByClassName(string $className): LoggerInterface
    {
        return ClassFactory::makeClass($className, LoggerInterface::class);
    }
}
