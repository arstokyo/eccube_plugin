<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Goods;

use Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaikoAll\GetZaikoAllRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaikoAll\GetZaikoAllResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;

class GetZaikoAllRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetZaikoAll()
    {
        $getZaikoAllRequestModel = $this->getZaikoAllRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getZaikoAllRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getZaikoAll xmlns="{$xmlns}">
                <rangefrom>112</rangefrom>
                <rangeto>333</rangeto>
                <id>13</id>
                <skid>111</skid>
            </getZaikoAll>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getZaikoAllRequestForSerialize(): GetZaikoAllRequestModel
    {
        $zaiko = new GetZaikoAllRequestModel();
        $getZaikoAll = $zaiko->setId(OverviewMapper::ACE_TEST_SYID)
                             ->setSouko("111")
                             ->setRangefrom(112)
                             ->setRangeto(333);
        return $getZaikoAll;
    }

    public function getZaikoAllRequestOK(): GetZaikoAllRequestModel
    {
        $zaiko = new GetZaikoAllRequestModel();
        $getZaikoAll = $zaiko->setId(OverviewMapper::ACE_TEST_SYID)
                             ->setSouko(100)
                             ->setRangefrom(1)
                             ->setRangeto(3);
        return $getZaikoAll;
    }
    public function getZaikoAllRequestNG(): GetZaikoAllRequestModel
    {
        $zaiko = new GetZaikoAllRequestModel();
        $getZaikoAll = $zaiko->setId(-1);
        return $getZaikoAll;
    }
    public function testRequestGetZaikoAllOK()
    {
        try {
            $getZaikoAllRequest = $this->getZaikoAllRequestOK();
            $response = $this->aceClient->makeGoodsService()
                                        ->makeGetZaikoAllMethod()
                                        ->withRequest($getZaikoAllRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetZaikoAllResponseModel $responseObj */
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
        $this->assertNotNull($goods1->getGdid());
        $this->assertNotNull($goods1->getName());
        $this->assertNotNull($goods1->getJsuu());

        $this->assertNotNull($goods2->getGdid());
        $this->assertNotNull($goods2->getName());
        $this->assertNotNull($goods2->getJsuu());

        $this->assertNotNull($goods3->getGdid());
        $this->assertNotNull($goods3->getName());
        $this->assertNotNull($goods3->getJsuu());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetZaikoAllNG()
    {
        try {
            $getZaikoAllRequest = $this->getZaikoAllRequestNG();
            $response = $this->aceClient->makeGoodsService()
                                        ->makeGetZaikoAllMethod()
                                        ->withRequest($getZaikoAllRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetZaikoAllResponseModel $responseObj */
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
