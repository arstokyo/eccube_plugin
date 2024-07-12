<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBumon\GetBumonRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBumon\GetBumonResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBumonRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBumon()
    {
        $getBumonRequestModel = $this->GetBumonRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getBumonRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBumon xmlns="{$xmlns}">
                <id>13</id>
            </getBumon>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBumonRequestForSerialize(): GetBumonRequestModel
    {
        $bumon = new GetBumonRequestModel();
        $getBumon = $bumon->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumon;
    }

    public function GetBumonRequestOK(): GetBumonRequestModel
    {
        $bumon = new GetBumonRequestModel();
        $getBumon = $bumon->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumon;
    }
    public function GetBumonRequestNG(): GetBumonRequestModel
    {
        $bumon = new GetBumonRequestModel();
        $getBumon = $bumon->setId(-1);
        return $getBumon;
    }
    public function testRequestGetBumonOK()
    {
        try {
            $getBumonRequest = $this->GetBumonRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonMethod()
                                        ->withRequest($getBumonRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $bumon1 = $responseObj->getMaster()->getBumon()[0];
                $bumon2 = $responseObj->getMaster()->getBumon()[1];
                $bumon3 = $responseObj->getMaster()->getBumon()[2];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("100", $bumon1->getCode());
        $this->assertEquals("部門１００", $bumon1->getName());

        $this->assertEquals("201", $bumon2->getCode());
        $this->assertEquals("GetZaikoTest部門", $bumon2->getName());

        $this->assertEquals("301", $bumon3->getCode());
        $this->assertEquals("ＧｅｔＢｕｍｏｎＦｒｅｅ", $bumon3->getName());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBumonNG()
    {
        try {
            $getBumonRequest = $this->GetBumonRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonMethod()
                                        ->withRequest($getBumonRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $bumon = $responseObj->getMaster()->getBumon();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $bumon);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
