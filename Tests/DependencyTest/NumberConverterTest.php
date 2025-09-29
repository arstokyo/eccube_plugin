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

namespace Plugin\AceClient43\Tests\AceRequestTest;

use Plugin\AceClient43\Util\Converter\NumberConverter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class NumberConverterTest extends KernelTestCase
{
    public function testConvertStringWithCommaToFloat()
    {
        $input = '1,555,222';
        $float = NumberConverter::stringWithCommaToFloat($input);
        $this->assertEquals($float, 1555222);
    }

    public function testConvertStringWithCommaToInt()
    {
        $input = '1,555,222';
        $int = NumberConverter::stringWithCommaToInt($input);
        $this->assertEquals($int, 1555222);
    }

    public function testConvertStringWithDotToFloat()
    {
        $input = '1.555.222';
        $float = NumberConverter::stringWithDotToFloat($input);
        $this->assertEquals($float, 1555222);
    }

    public function testConvertStringWithDotToInt()
    {
        $input = '1.555.222';
        $int = NumberConverter::stringWithDotToInt($input);
        $this->assertEquals($int, 1555222);
    }

    public function testConvertNullStringToFloat()
    {
        $input = '';
        $float = NumberConverter::stringWithCommaToFloat($input);
        $this->assertEquals($float, 0);
    }
}
