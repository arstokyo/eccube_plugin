<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetHoliday\GetHolidayRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetHoliday\GetHolidayResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetHolidayRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetHoliday()
    {
        $getHolidayRequestModel = $this->GetHolidayRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getHolidayRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getHoliday xmlns="{$xmlns}">
                <startday>20240101</startday>
                <endday>20240601</endday>
                <skid>300</skid>
                <syid>13</syid>
            </getHoliday>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function GetHolidayRequestForSerialize(): GetHolidayRequestModel
    {
        $holiday = new GetHolidayRequestModel();
        $getHoliday = $holiday->setSyid(OverviewMapper::ACE_TEST_SYID)
                              ->setStartday('20240101')
                              ->setEndday('20240601')
                              ->setSkid("300");
        return $getHoliday;
    }

    public function GetHolidayRequestOK(): GetHolidayRequestModel
    {
        $holiday = new GetHolidayRequestModel();
        $getHoliday = $holiday->setSyid(OverviewMapper::ACE_TEST_SYID)
                              ->setStartday('20240101')
                              ->setEndday('20240601')
                              ->setSkid("300");
        return $getHoliday;
    }
    public function GetHolidayRequestNG(): GetHolidayRequestModel
    {
        $holiday = new GetHolidayRequestModel();
        $getHoliday = $holiday->setSyid(-1)
                              ->setStartday('20240101')
                              ->setEndday('20240601')
                              ->setSkid("300");
        return $getHoliday;
    }
    public function testRequestGetHolidayOK()
    {
        try {
            $getHolidayRequest = $this->GetHolidayRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetHolidayMethod()
                                        ->withRequest($getHolidayRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHolidayResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $calendar1 = $responseObj->getMaster()->getCalendar()[0];
                $calendar2 = $responseObj->getMaster()->getCalendar()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(300, $calendar1->getSkid());
        $this->assertEquals("2024-01-06", $calendar1->getDay()->toShortDate());
        $this->assertEquals(1, $calendar1->getHolkbn());
        $this->assertEquals("", $calendar1->getMemo());
        $this->assertEquals("000000", $calendar1->getFrcolor());
        $this->assertEquals(1, $calendar1->getShowdays());

        $this->assertEquals(300, $calendar2->getSkid());
        $this->assertEquals("2024-01-07", $calendar2->getDay()->toShortDate());
        $this->assertEquals(1, $calendar2->getHolkbn());
        $this->assertEquals("", $calendar2->getMemo());
        $this->assertEquals("000000", $calendar2->getFrcolor());
        $this->assertEquals(1, $calendar2->getShowdays());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetHolidayNG()
    {
        try {
            $GetHolidayRequest = $this->GetHolidayRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetHolidayMethod()
                                        ->withRequest($GetHolidayRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHolidayResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $calendar = $responseObj->getMaster()->getCalendar();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $calendar);
        $this->assertEquals("カレンダーデータが存在しません", $message->getMessage1());
        $this->assertEquals("select skid,day,holkbn,memo,frcolor,showdays from calendar where syid=:xsyid and skid=:xskid and day between :xsday and :xeday", $message->getMessage2());
    }
}
