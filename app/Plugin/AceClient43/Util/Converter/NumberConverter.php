<?php

namespace Plugin\AceClient43\Util\Converter;

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
    public static function stringWithCommaToFloat(?string $value): float
    {
        return (float) str_replace([',', '、'], '', $value);
    }

    /**
     * Convert string with comma to int
     * 
     * @param string|null $value
     * @return int
     */
    public static function stringWithCommaToInt(?string $value): int
    {
        return (int) str_replace([',', '、'], '', $value);
    }

    /**
     * Convert string with dot to float
     * 
     * @param string|null $value
     * @return float
     */
    public static function stringWithDotToFloat(?string $value): float
    {
        return (float) str_replace(['.', '。'], '', $value);
    }

    /**
     * Convert string with dot to int
     * 
     * @param string|null $value
     * @return int
     */
    public static function stringWithDotToInt(?string $value): int
    {
        return (int) str_replace(['.', '。'], '', $value);
    }

}