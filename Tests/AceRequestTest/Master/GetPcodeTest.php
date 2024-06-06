<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetPcode\GetPcodeRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetPcode\GetPcodeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetPcodeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetPcode()
    {
        $getPcodeRequestModel = $this->GetPcodeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getPcodeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getPcode xmlns="{$xmlns}">
                <id>13</id>
            </getPcode>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetPcodeRequestForSerialize(): GetPcodeRequestModel
    {
        $pcode = new GetPcodeRequestModel();
        $getPcode = $pcode->setId(OverviewMapper::ACE_TEST_SYID);
        return $getPcode;
    }

    public function GetPcodeRequestOK(): GetPcodeRequestModel
    {
        $pcode = new GetPcodeRequestModel();
        $getPcode = $pcode->setId(OverviewMapper::ACE_TEST_SYID);
        return $getPcode;
    }
    public function GetPcodeRequestNG(): GetPcodeRequestModel
    {
        $pcode = new GetPcodeRequestModel();
        $getPcode = $pcode->setId(-1);
        return $getPcode;
    }
    public function testRequestGetPcodeOK()
    {
        try {
            $getPcodeRequest = $this->GetPcodeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetPcodeMethod()
                                        ->withRequest($getPcodeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPcodeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $pcode1 = $responseObj->getMaster()->getPcode()[0];
                $pcode2 = $responseObj->getMaster()->getPcode()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("10", $pcode1->getCode());
        $this->assertEquals("クレジットカード", $pcode1->getName());
        $this->assertEquals("", $pcode1->getPcodeSyurui());
        $this->assertEquals("0", $pcode1->getMemo());

        $this->assertEquals("11", $pcode2->getCode());
        $this->assertEquals("後払い", $pcode2->getName());
        $this->assertEquals("", $pcode2->getPcodeSyurui());
        $this->assertEquals("0", $pcode2->getMemo());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetPcodeNG()
    {
        try {
            $getPcodeRequest = $this->GetPcodeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetPcodeMethod()
                                        ->withRequest($getPcodeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPcodeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $pcode = $responseObj->getMaster()->getPcode();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $pcode);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
