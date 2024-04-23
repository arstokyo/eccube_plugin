<?php

namespace Plugin\AceClient\Utils\ClassFactory;

use Plugin\AceClient\Exception\InvalidClassNameException;

/**
 * Class Factory
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ClassFactory
{
    /**
     * Make a new class instance.
     *
     * @param string $className
     * 
     * @return object
     */
    public static function makeClass(string $className): object
    {
        if (!\class_exists($className)) {
            throw new InvalidClassNameException(sprintf('Given class name does not exist. Given class name %s', $className));
        };
        return new $className();
    }

    /**
     * Make a new class instance with arguments.
     *
     * @param string $className
     * @param mixed  ...$args
     * 
     * @return object
     */
    public static function makeClassArgs(string $className, ...$args): object
    {
        if (!\class_exists($className)) {
            throw new InvalidClassNameException(sprintf('Given class name does not exist. Given class name %s', $className));
        }
        return new $className(...$args);
    }
}