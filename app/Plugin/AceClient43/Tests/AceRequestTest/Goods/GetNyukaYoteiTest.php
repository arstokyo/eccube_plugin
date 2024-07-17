<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Goods;

use Plugin\AceClient43\AceServices\Model\Request\Goods\GetNyukaYotei\GetNyukaYoteiRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetNyukaYotei\GetNyukaYoteiResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;

class GetNyukaYoteiRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetNyukaYotei()
    {
        $getNyukaYoteiRequestModel = $this->GetNyukaYoteiRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getNyukaYoteiRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getNyukaYotei xmlns="{$xmlns}">
                <skid>400</skid>
                <id>13</id>
                <gdid>400</gdid>
            </getNyukaYotei>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetNyukaYoteiRequestForSerialize(): GetNyukaYoteiRequestModel
    {
        $nyukaYotei = new GetNyukaYoteiRequestModel();
        $getNyukaYotei = $nyukaYotei->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setSkid("400")
                                ->setGdid("400");
        return $getNyukaYotei;
    }

    public function GetNyukaYoteiRequestOK(): GetNyukaYoteiRequestModel
    {
        $nyukaYotei = new GetNyukaYoteiRequestModel();
        $getNyukaYotei = $nyukaYotei->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setSkid("400")
                                ->setGdid("400");
        return $getNyukaYotei;
    }
    public function GetNyukaYoteiRequestNG(): GetNyukaYoteiRequestModel
    {
        $nyukaYotei = new GetNyukaYoteiRequestModel();
        $getNyukaYotei = $nyukaYotei->setId(-1)
                                ->setSkid("400")
                                ->setGdid("400");
        return $getNyukaYotei;
    }
    public function testRequestGetNyukaYoteiOK()
    {
        try {
            $getNyukaYoteiRequest = $this->GetNyukaYoteiRequestOK();
            $response = $this->aceClient->makeGoodsService()
                                       ->makeGetNyukaYoteiMethod()
                                       ->withRequest($getNyukaYoteiRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetNyukaYoteiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods1 = $responseObj->getMaster()->getGoods()[0];
                $goods2 = $responseObj->getMaster()->getGoods()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("400", $goods1->getGdid());
        $this->assertEquals("ＧｅｔＮｙｕｋａＹｏｔｅｉテスト商品", $goods1->getName());
        $this->assertEquals("2999-06-20", $goods1->getNyday()->toShortDate());
        $this->assertEquals(700, $goods1->getSuu());

        $this->assertEquals("400", $goods2->getGdid());
        $this->assertEquals("ＧｅｔＮｙｕｋａＹｏｔｅｉテスト商品", $goods2->getName());
        $this->assertEquals("2999-06-30", $goods2->getNyday()->toShortDate());
        $this->assertEquals(200, $goods2->getSuu());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetNyukaYoteiNG()
    {
        try {
            $GetNyukaYoteiRequest = $this->GetNyukaYoteiRequestNG();
            $response = $this->aceClient->makeGoodsService()
                                       ->makeGetNyukaYoteiMethod()
                                       ->withRequest($GetNyukaYoteiRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetNyukaYoteiResponseModel $responseObj */
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
