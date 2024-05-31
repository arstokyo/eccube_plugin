<?php

namespace Plugin\AceClient\Util\ClassFactory;

use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;

/**
 * Class Factory
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class ClassFactory
{
    /**
     * Make a new class instance.
     *
     * @param string $className
     * @param ?string $targetInterface
     * 
     * @return object
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    final public static function makeClass(string $className, $targetInterface = null): object
    {
        self::validateClassExists($className);
        return self::validateCompatible(new $className(), $targetInterface);
    }

    /**
     * Make a new class instance with arguments.
     *
     * @param string $className
     * @param ?string $targetInterface
     * @param mixed  ...$args
     * 
     * @return object
     * 
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    final public static function makeClassArgs(string $className,?string $targetInterface = null, ...$args): object
    {
        self::validateClassExists($className);
        return self::validateCompatible(new $className(...$args), $targetInterface);
    }

    /**
     * Validate the object is compatible with the target interface.
     * 
     * @param string|object $obj
     * @param ?string $targetInterface
     * 
     * @return string|object
     * @throws DataTypeMissMatchException
     */
    final public static function validateCompatible(string|object $obj, ?string $targetInterface): string|object
    {
        if ($targetInterface) {
            $interfaces = class_implements($obj);
            if (!(in_array($targetInterface, $interfaces, true))){
                throw new DataTypeMissMatchException(sprintf('Given object is not compatible with %s. Given object %s', $targetInterface, self::getNameOfObject($obj)));
            };
        };
        return $obj;
    }

    /**
     * Check the class exists.
     * 
     * @param string $className
     * 
     * @return bool
     * 
     * @throws InvalidClassNameException
     */
    public static function validateClassExists(string $className): bool
    {
        if (!class_exists($className)) {
            throw new InvalidClassNameException(sprintf('Given class name does not exist. Given class name %s', $className));
        }
        return true;
    }

    /**
     * Get the name of the object.
     * 
     * @param object|string $obj
     * 
     * @return string
     */
    private static function getNameOfObject(object|string $obj): string
    {
        return is_object($obj) ? get_class($obj) : $obj;
    }

}