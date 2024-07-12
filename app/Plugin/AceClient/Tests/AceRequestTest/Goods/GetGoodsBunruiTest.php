<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Goods;

use Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsBunrui\GetGoodsBunruiRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsBunrui\GetGoodsBunruiResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;

class GetGoodsBunruiRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetGoodsBunrui()
    {
        $getGoodsBunruiRequestModel = $this->GetGoodsBunruiRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getGoodsBunruiRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGoodsBunrui xmlns="{$xmlns}">
                <kubun>1</kubun>
                <id>13</id>
            </getGoodsBunrui>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetGoodsBunruiRequestForSerialize(): GetGoodsBunruiRequestModel
    {
        $goodsBunrui = new GetGoodsBunruiRequestModel();
        $getGoodsBunrui = $goodsBunrui->setId(OverviewMapper::ACE_TEST_SYID)
                                      ->setKubun("1");
        return $getGoodsBunrui;
    }

    public function GetGoodsBunruiRequestOK(): GetGoodsBunruiRequestModel
    {
        $goodsBunrui = new GetGoodsBunruiRequestModel();
        $getGoodsBunrui = $goodsBunrui->setId(OverviewMapper::ACE_TEST_SYID)
                                      ->setKubun("1");
        return $getGoodsBunrui;
    }
    public function GetGoodsBunruiRequestNG(): GetGoodsBunruiRequestModel
    {
        $goodsBunrui = new GetGoodsBunruiRequestModel();
        $getGoodsBunrui = $goodsBunrui->setId(-1)
                                      ->setKubun("1");
        return $getGoodsBunrui;
    }
    public function testRequestGetGoodsBunruiOK()
    {
        try {
            $GetGoodsBunruiRequest = $this->GetGoodsBunruiRequestOK();
            $response = $this->aceClient->makeGoodsService()
                                       ->makeGetGoodsBunruiMethod()
                                       ->withRequest($GetGoodsBunruiRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsBunruiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods1 = $responseObj->getMaster()->getGoods()[0];
                $goods2 = $responseObj->getMaster()->getGoods()[1];
                $goods3 = $responseObj->getMaster()->getGoods()[2];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("100004", $goods1->getKubun());
        $this->assertEquals("100", $goods1->getFcid());
        $this->assertEquals("大分類100", $goods1->getName());
        $this->assertEquals("ノート１", $goods1->getNote1());
        $this->assertEquals("ノート２", $goods1->getNote2());
        $this->assertEquals("ノート３", $goods1->getNote3());

        $this->assertEquals("100004", $goods2->getKubun());
        $this->assertEquals("101", $goods2->getFcid());
        $this->assertEquals("大分類101", $goods2->getName());
        $this->assertEquals("ノート００００００１", $goods2->getNote1());
        $this->assertEquals("ノート００００００２", $goods2->getNote2());
        $this->assertEquals("ノート００００００３", $goods2->getNote3());

        $this->assertEquals("100004", $goods3->getKubun());
        $this->assertEquals("50", $goods3->getFcid());
        $this->assertEquals("大分類50", $goods3->getName());
        $this->assertEquals("", $goods3->getNote1());
        $this->assertEquals("", $goods3->getNote2());
        $this->assertEquals("", $goods3->getNote3());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetGoodsBunruiNG()
    {
        try {
            $GetGoodsBunruiRequest = $this->GetGoodsBunruiRequestNG();
            $response = $this->aceClient->makeGoodsService()
                                       ->makeGetGoodsBunruiMethod()
                                       ->withRequest($GetGoodsBunruiRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsBunruiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods = $responseObj->getMaster()->getGoods();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $goods);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
