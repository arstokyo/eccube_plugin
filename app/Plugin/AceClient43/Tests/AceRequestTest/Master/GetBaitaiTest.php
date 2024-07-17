<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBaitai\GetBaitaiRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBaitai\GetBaitaiResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBaitaiRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBaitai()
    {
        $getBaitaiRequestModel = $this->GetBaitaiRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getBaitaiRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBaitai xmlns="{$xmlns}">
                <id>13</id>
            </getBaitai>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBaitaiRequestForSerialize(): GetBaitaiRequestModel
    {
        $baitai = new GetBaitaiRequestModel();
        $getBaitai = $baitai->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBaitai;
    }

    public function GetBaitaiRequestOK(): GetBaitaiRequestModel
    {
        $baitai = new GetBaitaiRequestModel();
        $getBaitai = $baitai->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBaitai;
    }
    public function GetBaitaiRequestNG(): GetBaitaiRequestModel
    {
        $baitai = new GetBaitaiRequestModel();
        $getBaitai = $baitai->setId(-1);
        return $getBaitai;
    }
    public function testRequestGetBaitaiOK()
    {
        try {
            $getBaitaiRequest = $this->GetBaitaiRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBaitaiMethod()
                                        ->withRequest($getBaitaiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBaitaiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $baitai1 = $responseObj->getMaster()->getBaitai()[0];
                $baitai2 = $responseObj->getMaster()->getBaitai()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("100", $baitai1->getCode());
        $this->assertEquals("媒体１００番", $baitai1->getName());
        $this->assertEquals("媒体１００", $baitai1->getSubName());
        $this->assertEquals("", $baitai1->getBun());
        $this->assertEquals("", $baitai1->getFcode1());
        $this->assertEquals("", $baitai1->getFcode2());
        $this->assertEquals(0, $baitai1->getDispkbn());

        $this->assertEquals("101", $baitai2->getCode());
        $this->assertEquals("媒体１０１番", $baitai2->getName());
        $this->assertEquals("媒体１０１", $baitai2->getSubName());
        $this->assertEquals("", $baitai2->getBun());
        $this->assertEquals("", $baitai2->getFcode1());
        $this->assertEquals("", $baitai2->getFcode2());
        $this->assertEquals(0, $baitai2->getDispkbn());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBaitaiNG()
    {
        try {
            $getBaitaiRequest = $this->GetBaitaiRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBaitaiMethod()
                                        ->withRequest($getBaitaiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBaitaiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $baitai = $responseObj->getMaster()->getBaitai();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $baitai);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
