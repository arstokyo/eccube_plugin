<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFreeMemo\GetGoodsFreeMemoRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetGoodsFreeMemo\GetGoodsFreeMemoResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetGoodsFreeMemoRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetGoodsFreeMemo()
    {
        $getGoodsFreeMemoRequestModel = $this->GetGoodsFreeMemoRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getGoodsFreeMemoRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGoodsFreeMemo xmlns="{$xmlns}">
                <id>13</id>
            </getGoodsFreeMemo>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetGoodsFreeMemoRequestForSerialize(): GetGoodsFreeMemoRequestModel
    {
        $freememo = new GetGoodsFreeMemoRequestModel();
        $getGoodsFreeMemo = $freememo->setId(OverviewMapper::ACE_TEST_SYID);
        return $getGoodsFreeMemo;
    }

    public function GetGoodsFreeMemoRequestOK(): GetGoodsFreeMemoRequestModel
    {
        $freememo = new GetGoodsFreeMemoRequestModel();
        $getGoodsFreeMemo = $freememo->setId(OverviewMapper::ACE_TEST_SYID);
        return $getGoodsFreeMemo;
    }
    public function GetGoodsFreeMemoRequestNG(): GetGoodsFreeMemoRequestModel
    {
        $freememo = new GetGoodsFreeMemoRequestModel();
        $getGoodsFreeMemo = $freememo->setId(-1);
        return $getGoodsFreeMemo;
    }
    public function testRequestGetGoodsFreeMemoOK()
    {
        try {
            $getGoodsFreeMemoRequest = $this->GetGoodsFreeMemoRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetGoodsFreeMemoMethod()
                                        ->withRequest($getGoodsFreeMemoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsFreeMemoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freememo1 = $responseObj->getMaster()->getFreeMemo()[0];
                $freememo2 = $responseObj->getMaster()->getFreeMemo()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(202001, $freememo1->getKubun());
        $this->assertEquals("100", $freememo1->getFoid());
        $this->assertEquals("メモ２０８５３５１００", $freememo1->getMemo());

        $this->assertEquals(202002, $freememo2->getKubun());
        $this->assertEquals("100", $freememo2->getFoid());
        $this->assertEquals("メモ商品マスタ２０２００２１００", $freememo2->getMemo());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetGoodsFreeMemoNG()
    {
        try {
            $getGoodsFreeMemoRequest = $this->GetGoodsFreeMemoRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetGoodsFreeMemoMethod()
                                        ->withRequest($getGoodsFreeMemoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsFreeMemoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freememo = $responseObj->getMaster()->getFreeMemo();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $freememo);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
