<?php

namespace Plugin\AceClient\Util\Converter;

/**
 * Class NumberConverter
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NumberConverter
{

    /**
     * Convert string with comma to float
     * 
     * @param string|null $value
     * @return float
     */
    public static function stringWithCommaToFloat(string|null $value): float
    {
        return (float)str_replace([',', '、'], '', $value);
    }

    /**
     * Convert string with comma to int
     * 
     * @param string|null $value
     * @return int
     */
    public static function stringWithCommaToInt(string|null $value): int
    {
        return (int)str_replace([',', '、'], '', $value);
    }

    /**
     * Convert string with dot to float
     * 
     * @param string|null $value
     * @return float
     */
    public static function stringWithDotToFloat(string|null $value): float
    {
        return (float)str_replace(['.', '。'], '', $value);
    }

    /**
     * Convert string with dot to int
     * 
     * @param string|null $value
     * @return int
     */
    public static function stringWithDotToInt(string|null $value): int
    {
        return (int)str_replace(['.', '。'], '', $value);
    }

}