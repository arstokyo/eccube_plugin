<?php

namespace Plugin\AceClient\Tests\AceRequestTest;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTime;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeFactory;
use Plugin\AceClient\Exception\AceDateTimeCreateFailedException;

class AceDateTimeTest extends AbstractAdminWebTestCase
{
    public function testCreateDateTime()
    {
        $datetime = new AceDateTime(new \DateTime('2021-10-10'));
        $this->assertEquals('2021', $datetime->year());
        $this->assertEquals('10', $datetime->month());
        $this->assertEquals('10', $datetime->day());
        $this->assertEquals('2021-10-10', $datetime->toShortDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseShortDate());
    }

    public function testCreateDateTimeFromInt()
    {
        $datetime = new AceDateTime(20211010);
        $this->assertEquals('2021', $datetime->year());
        $this->assertEquals('10', $datetime->month());
        $this->assertEquals('10', $datetime->day());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseShortDate());
    }

    public function testCreateDateTimeFromString()
    {
        $datetime = new AceDateTime('20211010');
        $this->assertEquals('2021', $datetime->year());
        $this->assertEquals('10', $datetime->month());
        $this->assertEquals('10', $datetime->day());
        $this->assertEquals('2021-10-10', $datetime->toShortDate());
        $this->assertEquals('2021年10月10日', $datetime->toJapaneseShortDate());
    }

    public function testCreateDateTimeFailed()
    {
        $this->expectException(AceDateTimeCreateFailedException::class);
        $datetime = new AceDateTime('2024/13/26');
    }

    public function testConvertToWesternDateCase1()
    {
        $datetime = new AceDateTime('平成18/02/27 00:00:00');
        $this->assertEquals('2006-02-27', $datetime->toShortDate());
    }

    public function testConvertToWesternDateCase2()
    {
        $datetime = new AceDateTime('令和6/02/27 00:00:00');
        $this->assertEquals('2024-02-27', $datetime->toShortDate());
    }

    public function testConvertFromAceFormatCase1()
    {
        $datetime = new AceDateTime('20060227120000');
        $this->assertEquals('2006-02-27 12:00:00', $datetime->toLongDate());
    }

    public function testConvertFromAceFormatCase2()
    {
        $datetime = new AceDateTime('200602', 'Ym');
        $this->assertEquals('200602', $datetime->toApiDateTime());
    }

    public function testConvertFromAceFormatCase3()
    {
        $datetime = new AceDateTime('2006/02/01', 'Ym');
        $this->assertEquals('200602', $datetime->toApiDateTime());
    }

    public function testConvertFromAceFormatCase4()
    {
        $datetime = new AceDateTime('2006-02-01', 'Ym');
        $this->assertEquals('200602', $datetime->toApiDateTime());
    }

    public function testConvertFromAceFormatCase5()
    {
        $datetime = new AceDateTime('2006-02-01', 'Y/m/d');
        $this->assertEquals('2006/02/01', $datetime->toApiDateTime());
    }

    public function testConvertFromAceFormatCase6()
    {
        $datetime = new AceDateTime('2006-02-01', 'Y/m/d H:i:s');
        $this->assertEquals('2006/02/01', $datetime->toApiDateTime());
    }

    public function testAceDateTimeFactoryNull()
    {
        $datetime = AceDateTimeFactory::makeAceDateTime('');
        $this->assertNull($datetime);

        $datetime = AceDateTimeFactory::makeAceDateTime(null);
        $this->assertNull($datetime);

    }

}