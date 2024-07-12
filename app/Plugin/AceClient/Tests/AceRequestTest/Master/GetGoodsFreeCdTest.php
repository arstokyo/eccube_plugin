<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetGoodsFreeCd\GetGoodsFreeCdRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFreeCd\GetGoodsFreeCdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetGoodsFreeCdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetGoodsFreeCd()
    {
        $getGoodsFreeCdRequestModel = $this->GetGoodsFreeCdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getGoodsFreeCdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGoodsFreeCd xmlns="{$xmlns}">
                <id>13</id>
            </getGoodsFreeCd>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetGoodsFreeCdRequestForSerialize(): GetGoodsFreeCdRequestModel
    {
        $freecd = new GetGoodsFreeCdRequestModel();
        $getGoodsFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $getGoodsFreeCd;
    }

    public function GetGoodsFreeCdRequestOK(): GetGoodsFreeCdRequestModel
    {
        $freecd = new GetGoodsFreeCdRequestModel();
        $getGoodsFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $getGoodsFreeCd;
    }
    public function GetGoodsFreeCdRequestNG(): GetGoodsFreeCdRequestModel
    {
        $freecd = new GetGoodsFreeCdRequestModel();
        $getGoodsFreeCd = $freecd->setId(-1);
        return $getGoodsFreeCd;
    }
    public function testRequestGetGoodsFreeCdOK()
    {
        try {
            $getGoodsFreeCdRequest = $this->GetGoodsFreeCdRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetGoodsFreeCdMethod()
                                        ->withRequest($getGoodsFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsFreeCdResponseModel $responseObj */
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

        $this->assertEquals(102, $freecd1->getKubun());
        $this->assertEquals("101", $freecd1->getFcid());
        $this->assertEquals("フリーコードテスト1", $freecd1->getName());
        $this->assertEquals("ノート1", $freecd1->getNote1());
        $this->assertEquals("ノート2", $freecd1->getNote2());
        $this->assertEquals("ノート3", $freecd1->getNote3());

        $this->assertEquals(102, $freecd2->getKubun());
        $this->assertEquals("102", $freecd2->getFcid());
        $this->assertEquals("フリーコードテスト2", $freecd2->getName());
        $this->assertEquals("ノート1", $freecd2->getNote1());
        $this->assertEquals("ノート2", $freecd2->getNote2());
        $this->assertEquals("ノート3", $freecd2->getNote3());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetGoodsFreeCdNG()
    {
        try {
            $getGoodsFreeCdRequest = $this->GetGoodsFreeCdRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetGoodsFreeCdMethod()
                                        ->withRequest($getGoodsFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsFreeCdResponseModel $responseObj */
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
