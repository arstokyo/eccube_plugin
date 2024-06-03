<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Goods;

use Plugin\AceClient\AceServices\Model\Request\Goods\GetGoodsMany\GetGoodsManyRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsMany\GetGoodsManyResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class GetGoodsManyRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetGoodsMany()
    {
        $getRirekiDetailRequestModel = $this->getGoodsManyRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getRirekiDetailRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGoodsMany xmlns="{$xmlns}">
            <ID>13</ID>
            <Souko>aaa</Souko>
            <Gcode>bbb</Gcode>
            </getGoodsMany>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getGoodsManyRequestForSerialize(): GetGoodsManyRequestModel
    {
        $goods = new GetGoodsManyRequestModel();
        $getGoodsMany = $goods->setId(OverviewMapper::ACE_TEST_SYID)
                        ->setSouko("aaa")
                        ->setGcode("bbb");
        return $getGoodsMany;
    }
    public function getGoodsManyRequestOK(): GetGoodsManyRequestModel
    {
        $goodsMany = new GetGoodsManyRequestModel();
        $getGoodsMany = $goodsMany->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setSouko("1")
                          ->setGcode("202|203");
        return $getGoodsMany;
    }
    public function getGoodsManyRequestNG(): GetGoodsManyRequestModel
    {
        $goodsMany = new GetGoodsManyRequestModel();
        $getGoodsMany = $goodsMany->setId(-1)
                          ->setSouko("1")
                          ->setGcode("202|203");
        return $getGoodsMany;
    }
    public function testRequestGetGoodsManyOK()
    {
        try {
            $getGoodsManyRequest = $this->getGoodsManyRequestOK();
            $response = $this->aceClient->makeGoodsService()
                                        ->makeGetGoodsManyMethod()
                                        ->withRequest($getGoodsManyRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsManyResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getGoods()->getMessage()->getMessage1();
                $good202 = $responseObj->getGoods()->getGood()[0];
                $good203 = $responseObj->getGoods()->getGood()[1];
                $message = $responseObj->getGoods()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("202", $good202->getGdid());
        $this->assertEquals("GetGoodsManyテスト商品1", $good202->getGname());
        $this->assertEquals(1100, $good202->getTanka1());
        $this->assertEquals(10998, $good202->getTanka2());
        $this->assertEquals(2200, $good202->getTanka3());
        $this->assertEquals(7700, $good202->getTanka4());
        $this->assertEquals(8800, $good202->getTanka5());
        $this->assertEquals(1716, $good202->getTanka6());
        $this->assertEquals(3410, $good202->getTanka7());
        $this->assertEquals(3850, $good202->getTanka8());
        $this->assertEquals(4400, $good202->getTanka9());
        $this->assertEquals(0, $good202->getZaiko());

        $this->assertEquals("203", $good203->getGdid());
        $this->assertEquals("GetGoodsManyテスト商品２", $good203->getGname());
        $this->assertEquals(1111, $good203->getTanka1());
        $this->assertEquals(21222, $good203->getTanka2());
        $this->assertEquals(1111, $good203->getTanka3());
        $this->assertEquals(23433, $good203->getTanka4());
        $this->assertEquals(4312, $good203->getTanka5());
        $this->assertEquals(25412, $good203->getTanka6());
        $this->assertEquals(56321, $good203->getTanka7());
        $this->assertEquals(54677, $good203->getTanka8());
        $this->assertEquals(4342, $good203->getTanka9());
        $this->assertEquals(0, $good203->getZaiko());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
    public function testRequestGetGoodsManyNG()
    {
        try {
            $getGoodsManyRequest = $this->getGoodsManyRequestNG();
            $response = $this->aceClient->makeGoodsService()
                                        ->makeGetGoodsManyMethod()
                                        ->withRequest($getGoodsManyRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsManyResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getGoods()->getMessage()->getMessage1();
                $good = $responseObj->getGoods()->getGood();
                $message = $responseObj->getGoods()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(null, $good);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}