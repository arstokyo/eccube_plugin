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
class PostalCodeConverter
{
    public static function ToAceFormat(string $postalCode)
    {
        if (strlen($postalCode) === 7) {
            return substr($postalCode, 0, 3).'-'.substr($postalCode, 3);
        }

        return $postalCode;
    }

    public static function FromAceFormat(string $postalCode)
    {
        if (strpos($postalCode, '-') !== false) {
            return str_replace('-', '', $postalCode);
        }

        return $postalCode;
    }
}
