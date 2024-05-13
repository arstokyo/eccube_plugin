<?php

namespace Plugin\AceClient\Tests\AceRequestTest;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTime;
use Plugin\AceClient\Exception\AceDateTimeCreateFailedException;

class AceDateTimeTest extends AbstractAdminWebTestCase
{
    public function testCreateDateTimeCase1()
    {
        $datetime = new AceDateTime(new \DateTime('2021-10-10'));
        $this->assertEquals('2021', $datetime->year());
        $this->assertEquals('10', $datetime->month());
        $this->assertEquals('10', $datetime->day());
        $this->assertEquals('2021-10-10', $datetime->toShortDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseLongDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseShortDate());
    }

    public function testCreateDateTimeFromInt()
    {
        $datetime = new AceDateTime(20211010);
        $this->assertEquals('2021', $datetime->year());
        $this->assertEquals('10', $datetime->month());
        $this->assertEquals('10', $datetime->day());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseLongDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseShortDate());
    }

    public function testCreateDateTimeFromString()
    {
        $datetime = new AceDateTime('20211010');
        $this->assertEquals('2021', $datetime->year());
        $this->assertEquals('10', $datetime->month());
        $this->assertEquals('10', $datetime->day());
        $this->assertEquals('2021-10-10', $datetime->toShortDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseLongDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseShortDate());
    }

    public function testFailCreateDateTime()
    {
        $this->expectException(AceDateTimeCreateFailedException::class);
        $datetime = new AceDateTime('2021-10-10', 'yyffssaahh');
    }
}