<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

trait ConvertToConstTrait
{
    /**
     * Converts the constant variable to the string.
     * 
     * @param string $constVar
     * @return string
     */
    protected function convertVarToStringConst(string $constVar): string
    {
        return constant($constVar);
    }

    /**
     * Converts the constant variable to the integer.
     * 
     * @param string $constVar
     * @return int
     */
    protected function convertVarToIntConst(string $constVar): int
    {
        return constant($constVar);
    }

}