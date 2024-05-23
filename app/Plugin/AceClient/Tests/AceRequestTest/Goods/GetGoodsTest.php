<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Goods;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Goods\GetGoods\GetGoodsRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Goods\GetGoods\GetGoodsResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;
use Plugin\AceClient\Utils\Serialize;


class GetGoodsRequestModelTest extends AbstractAdminWebTestCase
{
    public function testSearializeGetGoods()
    {
        $getRirekiDetailRequestModel = $this->getGoodsRequestForSerialize();
        $serializer = Serialize\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getRirekiDetailRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serialize\SoapXMLSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGoods xmlns="{$xmlns}">
            <id>13</id>
            <execDateFrom>2021/01/01 12:00:00</execDateFrom>
            <execDateTo>2021/01/31 23:59:59</execDateTo>
            </getGoods>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getGoodsRequestForSerialize(): GetGoodsRequestModel
    {
        $goods = new GetGoodsRequestModel();
        $getGoods = $goods->setId(OverviewMapper::ACE_TEST_SYID)->setExecDateFrom("2021-01-01 12:00:00")->setExecDateTo("2021-01-31 23:59:59");
        return $getGoods;
    }
    public function getGoodsRequestOK(): GetGoodsRequestModel
    {
        $goods = new GetGoodsRequestModel();
        $getGoods = $goods->setId(OverviewMapper::ACE_TEST_SYID);
        return $getGoods;
    }
    public function getGoodsRequestNG(): GetGoodsRequestModel
    {
        $goods = new GetGoodsRequestModel();
        $getGoods = $goods->setId(-1);
        return $getGoods;
    }
    public function testRequestGetGoodsOK()
    {
        try {
            $getGoodsRequest = $this->getGoodsRequestOK();
            $response = (new AceClient)->makeGoodsService()
                                       ->makeGetGoodsMethod()
                                       ->withRequest($getGoodsRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods1 = $responseObj->getMaster()->getGoods()[0];
                $goods2 = $responseObj->getMaster()->getGoods()[1];
                $goods84 = $responseObj->getMaster()->getGoods()[83];
                $gtanka1 = $responseObj->getMaster()->getGtanka()[0];
                $gtanka2 = $responseObj->getMaster()->getGtanka()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("1289-0", $goods1->getGdid());
        $this->assertEquals(0, $goods1->getTkbn());
        $this->assertEquals(0, $goods1->getGkbn());
        $this->assertEquals(0, $goods1->getKake());
        $this->assertEquals(0, $goods1->getSkbn());
        $this->assertEquals(0, $goods1->getNprint());
        $this->assertEquals(0, $goods1->getZkbn());
        $this->assertEquals("", $goods1->getKikaku1());
        $this->assertEquals("", $goods1->getKikaku2());
        $this->assertEquals("", $goods1->getKana());
        $this->assertEquals("紙おむつ大人用光洋　スリムフラット 1袋30入 吸収量：3回分　【1袋販売】尿とりパッド　光洋 フラット　尿取りパット　フラットタイプ　男性用女性用　病院施設用　無地箱　光洋公式", $goods1->getName1());
        $this->assertEquals("紙おむつ大人用光洋　スリムフラット 1袋30入 吸収量：3回", $goods1->getSubnm1());
        $this->assertEquals("", $goods1->getTani());
        $this->assertEquals("", $goods1->getBarcode());
        $this->assertEquals(0, $goods1->getKonpo());
        $this->assertEquals(0, $goods1->getDelfg());
        $this->assertEquals(1, $goods1->getTeiki());
        $this->assertEquals(0, $goods1->getTyoku());
        $this->assertEquals(0, $goods1->getKgsuu());
        $this->assertEquals(0, $goods1->getZgsuu());
        $this->assertEquals(null, $goods1->getKgdate());
        $this->assertEquals(null, $goods1->getZgdate());
        $this->assertEquals(0, $goods1->getKeepsuu());
        $this->assertEquals("1289-0", $goods1->getGhid());
        $this->assertEquals("", $goods1->getKana1());
        $this->assertEquals("紙おむつ大人用光洋　スリムフラット 1袋30入 吸収量：3回分　【1袋販売】尿とりパッド　光洋 フラット　尿取りパット　フラットタイプ　男性用女性用　病院施設用　無地箱　光洋公式", $goods1->getGname());
        $this->assertEquals("紙おむつ大人用光洋　スリムフラット 1袋30入 吸収量：3回", $goods1->getSubName());
        $this->assertEquals("", $goods1->getNote1());
        $this->assertEquals("", $goods1->getNote2());
        $this->assertEquals("", $goods1->getNote3());

        $this->assertEquals("105HMT1", $goods2->getGdid());
        $this->assertEquals(0, $goods2->getTkbn());
        $this->assertEquals(0, $goods2->getGkbn());
        $this->assertEquals(0, $goods2->getKake());
        $this->assertEquals(0, $goods2->getSkbn());
        $this->assertEquals(0, $goods2->getNprint());
        $this->assertEquals(0, $goods2->getZkbn());
        $this->assertEquals("", $goods2->getKikaku1());
        $this->assertEquals("", $goods2->getKikaku2());
        $this->assertEquals("", $goods2->getKana());
        $this->assertEquals("特許醗酵食品　醗酵はとむぎα　粒タイプ", $goods2->getName1());
        $this->assertEquals("HMT1", $goods2->getSubnm1());
        $this->assertEquals("", $goods2->getTani());
        $this->assertEquals("", $goods2->getBarcode());
        $this->assertEquals(0, $goods2->getKonpo());
        $this->assertEquals(0, $goods2->getDelfg());
        $this->assertEquals(0, $goods2->getTeiki());
        $this->assertEquals(0, $goods2->getTyoku());
        $this->assertEquals(0, $goods2->getKgsuu());
        $this->assertEquals(0, $goods2->getZgsuu());
        $this->assertEquals(null, $goods2->getKgdate());
        $this->assertEquals(null, $goods2->getZgdate());
        $this->assertEquals(0, $goods2->getKeepsuu());
        $this->assertEquals("105HMT1", $goods2->getGhid());
        $this->assertEquals("", $goods2->getKana1());
        $this->assertEquals("特許醗酵食品　醗酵はとむぎα　粒タイプ", $goods2->getGname());
        $this->assertEquals("HMT1", $goods2->getSubName());
        $this->assertEquals("", $goods2->getNote1());
        $this->assertEquals("", $goods2->getNote2());
        $this->assertEquals("", $goods2->getNote3());

        $this->assertEquals("201", $goods84->getGdid());
        $this->assertEquals(10, $goods84->getTkbn());
        $this->assertEquals(30, $goods84->getGkbn());
        $this->assertEquals(1, $goods84->getKake());
        $this->assertEquals(1, $goods84->getSkbn());
        $this->assertEquals(2, $goods84->getNprint());
        $this->assertEquals(1, $goods84->getZkbn());
        $this->assertEquals("15", $goods84->getKikaku1());
        $this->assertEquals("3", $goods84->getKikaku2());
        $this->assertEquals("ショウヒン２０１GetGoodテスト", $goods84->getKana());
        $this->assertEquals("GetGoodテスト商品201", $goods84->getGname());
        $this->assertEquals("GetGoodテスト商品201aa", $goods84->getSubName());
        $this->assertEquals("aa", $goods84->getTani());
        $this->assertEquals("123456789-8888", $goods84->getBarcode());
        $this->assertEquals(55, $goods84->getKonpo());
        $this->assertEquals(0, $goods84->getDelfg());
        $this->assertEquals(2, $goods84->getTeiki());
        $this->assertEquals(2, $goods84->getTyoku());
        $this->assertEquals(10, $goods84->getKgsuu());
        $this->assertEquals(2, $goods84->getZgsuu());
        $this->assertEquals("2024-05-16", $goods84->getKgdate()->toShortDate());
        $this->assertEquals("2024-05-30", $goods84->getZgdate()->toShortDate());
        $this->assertEquals(8, $goods84->getKeepsuu());
        $this->assertEquals("100", $goods84->getGhid());
        $this->assertEquals("ヒンバン１００", $goods84->getKana1());
        $this->assertEquals("品番１００", $goods84->getName1());
        $this->assertEquals("品番１００", $goods84->getSubnm1());
        $this->assertEquals("", $goods84->getNote1());
        $this->assertEquals("", $goods84->getNote2());
        $this->assertEquals("", $goods84->getNote3());

        $this->assertEquals("0832724", $gtanka1->getGdid());
        $this->assertEquals(1, $gtanka1->getTankaKbn());
        $this->assertEquals("2022-12-26", $gtanka1->getDay()->toShortDate());
        $this->assertEquals(10, $gtanka1->getTaxrate());
        $this->assertEquals(49280, $gtanka1->getInctanka());
        $this->assertEquals(44800, $gtanka1->getRevtanka());
        $this->assertEquals(1, $gtanka1->getTaxkbn());
        $this->assertEquals(0, $gtanka1->getPoint());
        $this->assertEquals("", $gtanka1->getNote());
        $this->assertEquals(null, $gtanka1->getNday());
        $this->assertEquals(0, $gtanka1->getNtaxrate());
        $this->assertEquals(0, $gtanka1->getNinctanka());
        $this->assertEquals(0, $gtanka1->getNrevtanka());
        $this->assertEquals(null, $gtanka1->getNtaxkbn());
        $this->assertEquals(null, $gtanka1->getNpoint());
        $this->assertEquals("", $gtanka1->getNnote());

        $this->assertEquals("0832724", $gtanka2->getGdid());
        $this->assertEquals(3, $gtanka2->getTankaKbn());
        $this->assertEquals("2022-12-26", $gtanka2->getDay()->toShortDate());
        $this->assertEquals(10, $gtanka2->getTaxrate());
        $this->assertEquals(44352, $gtanka2->getInctanka());
        $this->assertEquals(40320, $gtanka2->getRevtanka());
        $this->assertEquals(1, $gtanka2->getTaxkbn());
        $this->assertEquals(0, $gtanka2->getPoint());
        $this->assertEquals("", $gtanka2->getNote());
        $this->assertEquals(null, $gtanka2->getNday());
        $this->assertEquals(0, $gtanka2->getNtaxrate());
        $this->assertEquals(0, $gtanka2->getNinctanka());
        $this->assertEquals(0, $gtanka2->getNrevtanka());
        $this->assertEquals(null, $gtanka2->getNtaxkbn());
        $this->assertEquals(null, $gtanka2->getNpoint());
        $this->assertEquals("", $gtanka2->getNnote());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
    public function testRequestGetGoodsNG()
    {
        try {
            $getGoodsRequest = $this->getGoodsRequestNG();
            $response = (new AceClient)->makeGoodsService()
                                       ->makeGetGoodsMethod()
                                       ->withRequest($getGoodsRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $goods = $responseObj->getMaster()->getGoods();
                $gtanka = $responseObj->getMaster()->getGtanka();
                $message = $responseObj->getMaster()->getMessage();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $goods);
        $this->assertEquals(null, $gtanka);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}