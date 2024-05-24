<?php

namespace Plugin\AceClient\Utils\Log;

use Psr\Log\LoggerInterface;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Utils\ClassFactory\ClassFactory;

class LoggerFactory 
{

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
