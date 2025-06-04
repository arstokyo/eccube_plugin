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

namespace Plugin\AceClient43\Util\ConfigLoader;

trait ConvertToConstTrait
{
    /**
     * Converts the constant variable to the string.
     *
     * @param string $constVar
     *
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
     *
     * @return int
     */
    protected function convertVarToIntConst(string $constVar): int
    {
        return constant($constVar);
    }
}
