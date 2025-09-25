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
     *
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
     *
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
     *
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
     *
     * @return int
     */
    public static function stringWithDotToInt(?string $value): int
    {
        return (int) str_replace(['.', '。'], '', $value);
    }

    public static function normalizeFloatToString(?float $value, int $scale = 2): ?string
    {
        if ($value === null) {
            return null;
        }

        return number_format($value, $scale, '.', '');
    }

    /**
     * Convert a number-like value to a normalized decimal string.
     *
     * - Accepts string|int|float|null (PHP 7.4 compatible signature).
     * - For strings: remove thousands separators (',' and '、') before converting.
     * - For int/float: delegate to normalizeFloatToString().
     *
     * @param mixed $value
     * @param int $scale
     *
     * @return string|null
     */
    public static function convertNumberToDecimalString($value, int $scale = 2): ?string
    {
        if ($value === null) {
            return null;
        }

        if (is_string($value)) {
            $clean = str_replace([',', '、'], '', trim($value));
            if ($clean === '' || $clean === '-' || $clean === '+') {
                $num = 0.0;
            } else {
                $num = (float) $clean;
            }

            return self::normalizeFloatToString($num, $scale);
        }

        if (is_int($value) || is_float($value)) {
            return self::normalizeFloatToString((float) $value, $scale);
        }

        // Fallback for other scalars
        return self::normalizeFloatToString((float) $value, $scale);
    }
}
