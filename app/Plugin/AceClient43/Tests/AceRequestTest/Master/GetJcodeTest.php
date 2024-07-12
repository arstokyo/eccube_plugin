<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetJcode\GetJcodeRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetJcode\GetJcodeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetJcodeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetJcode()
    {
        $getJcodeRequestModel = $this->GetJcodeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getJcodeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getJcode xmlns="{$xmlns}">
                <id>13</id>
            </getJcode>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetJcodeRequestForSerialize(): GetJcodeRequestModel
    {
        $jcode = new GetJcodeRequestModel();
        $getJcode = $jcode->setId(OverviewMapper::ACE_TEST_SYID);
        return $getJcode;
    }

    public function GetJcodeRequestOK(): GetJcodeRequestModel
    {
        $jcode = new GetJcodeRequestModel();
        $getJcode = $jcode->setId(OverviewMapper::ACE_TEST_SYID);
        return $getJcode;
    }
    public function GetJcodeRequestNG(): GetJcodeRequestModel
    {
        $jcode = new GetJcodeRequestModel();
        $getJcode = $jcode->setId(-1);
        return $getJcode;
    }
    public function testRequestGetJcodeOK()
    {
        try {
            $getJcodeRequest = $this->GetJcodeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetJcodeMethod()
                                        ->withRequest($getJcodeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetJcodeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $jcode1 = $responseObj->getMaster()->getJcode()[0];
                $jcode2 = $responseObj->getMaster()->getJcode()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("1", $jcode1->getCode());
        $this->assertEquals("ECサイト", $jcode1->getName());

        $this->assertEquals("2", $jcode2->getCode());
        $this->assertEquals("Amazon", $jcode2->getName());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetJcodeNG()
    {
        try {
            $getJcodeRequest = $this->GetJcodeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetJcodeMethod()
                                        ->withRequest($getJcodeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetJcodeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $jcode = $responseObj->getMaster()->getJcode();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $jcode);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
