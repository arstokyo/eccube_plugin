<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master2;

use Plugin\AceClient43\AceServices\Model\Request\Master2\GetHaisouDayTime\GetHaisouDayTimeRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master2\GetHaisouDayTime\GetHaisouDayTimeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetHaisouDayTimeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetHaisouDayTime()
    {
        $getHaisouDayTimeRequestModel = $this->GetHaisouDayTimeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getHaisouDayTimeRequestModel);
        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getHaisouDayTime xmlns="{$xmlns}">
                <id>13</id>
                <souko>111</souko>
                <hcode>222</hcode>
                <zip>333</zip>
            </getHaisouDayTime>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetHaisouDayTimeRequestForSerialize(): GetHaisouDayTimeRequestModel
    {
        $haisouDayTime = new GetHaisouDayTimeRequestModel();
        $getHaisouDayTime = $haisouDayTime->setId(OverviewMapper::ACE_TEST_SYID)
                                          ->setSouko(111)
                                          ->setHcode(222)
                                          ->setZip(333);
        return $getHaisouDayTime;
    }

    public function GetHaisouDayTimeRequestOK(): GetHaisouDayTimeRequestModel
    {
        $haisouDayTime = new GetHaisouDayTimeRequestModel();
        $getHaisouDayTime = $haisouDayTime->setId(OverviewMapper::ACE_TEST_SYID)
                                          ->setSouko(100)
                                          ->setHcode(100)
                                          ->setZip("120-0000");
        return $getHaisouDayTime;
    }
    public function GetHaisouDayTimeRequestNG(): GetHaisouDayTimeRequestModel
    {
        $haisouDayTime = new GetHaisouDayTimeRequestModel();
        $getHaisouDayTime = $haisouDayTime->setId(-1)
                                          ->setSouko(100)
                                          ->setHcode(100)
                                          ->setZip("120-0000");
        return $getHaisouDayTime;
    }
    public function testRequestGetHaisouDayTimeOK()
    {
        try {
            $getHaisouDayTimeRequest = $this->GetHaisouDayTimeRequestOK();
            $response = $this->aceClient->makeMaster2Service()
                                        ->makeGetHaisouDayTimeMethod()
                                        ->withRequest($getHaisouDayTimeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHaisouDayTimeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $daystime = $responseObj->getMaster()->getDaysTime();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(1, $daystime->getDays());
        $this->assertEquals(0, $daystime->getTime());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetHaisouDayTimeNG()
    {
        try {
            $GetHaisouDayTimeRequest = $this->GetHaisouDayTimeRequestNG();
            $response = $this->aceClient->makeMaster2Service()
                                        ->makeGetHaisouDayTimeMethod()
                                        ->withRequest($GetHaisouDayTimeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHaisouDayTimeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $daystime = $responseObj->getMaster()->getDaysTime();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(0, $daystime->getDays());
        $this->assertEquals(0, $daystime->getTime());
        $this->assertEquals("システムＩＤ設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
