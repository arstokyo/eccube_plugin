<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetMemAnkFreeCd\GetMemAnkFreeCdRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetMemAnkFreeCd\GetMemAnkFreeCdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemAnkFreeCdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemAnkFreeCd()
    {
        $getMemAnkFreeCdRequestModel = $this->GetMemAnkFreeCdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemAnkFreeCdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemAnkFreeCd xmlns="{$xmlns}">
                <id>13</id>
            </getMemAnkFreeCd>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemAnkFreeCdRequestForSerialize(): GetMemAnkFreeCdRequestModel
    {
        $freecd = new GetMemAnkFreeCdRequestModel();
        $GetMemAnkFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $GetMemAnkFreeCd;
    }

    public function GetMemAnkFreeCdRequestOK(): GetMemAnkFreeCdRequestModel
    {
        $freecd = new GetMemAnkFreeCdRequestModel();
        $GetMemAnkFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $GetMemAnkFreeCd;
    }
    public function GetMemAnkFreeCdRequestNG(): GetMemAnkFreeCdRequestModel
    {
        $freecd = new GetMemAnkFreeCdRequestModel();
        $GetMemAnkFreeCd = $freecd->setId(-1);
        return $GetMemAnkFreeCd;
    }
    public function testRequestGetMemAnkFreeCdOK()
    {
        try {
            $getMemAnkFreeCdRequest = $this->GetMemAnkFreeCdRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemAnkFreeCdMethod()
                                        ->withRequest($getMemAnkFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemAnkFreeCdResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freecd1 = $responseObj->getMaster()->getFreeCd()[0];
                $freecd2 = $responseObj->getMaster()->getFreeCd()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(105001, $freecd1->getKubun());
        $this->assertEquals("0", $freecd1->getFcid());
        $this->assertEquals("祝日-不可能", $freecd1->getName());
        $this->assertEquals("ノート１", $freecd1->getNote1());
        $this->assertEquals("ノート１", $freecd1->getNote2());
        $this->assertEquals("ノート１", $freecd1->getNote3());

        $this->assertEquals(105001, $freecd2->getKubun());
        $this->assertEquals("1", $freecd2->getFcid());
        $this->assertEquals("領収書・日曜日-不可能", $freecd2->getName());
        $this->assertEquals("ノート１", $freecd2->getNote1());
        $this->assertEquals("ノート１", $freecd2->getNote2());
        $this->assertEquals("ノート１", $freecd2->getNote3());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemAnkFreeCdNG()
    {
        try {
            $getMemAnkFreeCdRequest = $this->GetMemAnkFreeCdRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemAnkFreeCdMethod()
                                        ->withRequest($getMemAnkFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemAnkFreeCdResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freecd = $responseObj->getMaster()->getFreeCd();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $freecd);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
