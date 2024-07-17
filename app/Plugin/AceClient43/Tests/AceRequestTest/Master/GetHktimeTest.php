<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetHktime\GetHktimeRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetHktime\GetHktimeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetHktimeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetHktime()
    {
        $getHktimeRequestModel = $this->GetHktimeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getHktimeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getHktime xmlns="{$xmlns}">
                <id>13</id>
                <code>222</code>
            </getHktime>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetHktimeRequestForSerialize(): GetHktimeRequestModel
    {
        $hktime = new GetHktimeRequestModel();
        $getHktime = $hktime->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setCode("222");
        return $getHktime;
    }

    public function GetHktimeRequestOK(): GetHktimeRequestModel
    {
        $hktime = new GetHktimeRequestModel();
        $getHktime = $hktime->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setCode("10");
        return $getHktime;
    }
    public function GetHktimeRequestNG(): GetHktimeRequestModel
    {
        $hktime = new GetHktimeRequestModel();
        $getHktime = $hktime->setId(-1)
                            ->setCode("10");
        return $getHktime;
    }
    public function testRequestGetHktimeOK()
    {
        try {
            $getHktimeRequest = $this->GetHktimeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetHktimeMethod()
                                        ->withRequest($getHktimeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHktimeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $hktime1 = $responseObj->getMaster()->getHktime()[0];
                $hktime2 = $responseObj->getMaster()->getHktime()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("0", $hktime1->getHkcode());
        $this->assertEquals("指定なし", $hktime1->getHkname());
        $this->assertEquals(0, $hktime1->getHktime());

        $this->assertEquals("1", $hktime2->getHkcode());
        $this->assertEquals("指定なし", $hktime2->getHkname());
        $this->assertEquals(null, $hktime2->getHktime());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetHktimeNG()
    {
        try {
            $getHktimeRequest = $this->GetHktimeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetHktimeMethod()
                                        ->withRequest($getHktimeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHktimeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $hktime = $responseObj->getMaster()->getHktime();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $hktime);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
