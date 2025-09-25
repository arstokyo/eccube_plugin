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

class ListConverter
{
    /**
     * Converts an array to a string with the specified separator
     *
     * @param array|null $array The array to convert
     * @param string $separator The separator to use (default: comma)
     *
     * @return string|null The resulting string, or null if the input is null or empty
     */
    public static function arrayToString(?array $array, string $separator = ','): ?string
    {
        if (empty($array)) {
            return null;
        }

        return implode($separator, $array);
    }
}
