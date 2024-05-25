<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Goods;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Goods\GetZaiko\GetZaikoRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Goods\GetZaiko\GetZaikoResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;
use Plugin\AceClient\Utils\Serialize;


class GetZaikoRequestModelTest extends AbstractAdminWebTestCase
{
    public function testSearializeGetZaiko()
    {
        $getZaikoRequestModel = $this->getZaikoRequestForSerialize();
        $serializer = Serialize\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getZaikoRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serialize\SoapXMLSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getZaiko xmlns="{$xmlns}">
                <id>13</id>
                <skid>111</skid>
                <gdid>idabc</gdid>
            </getZaiko>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getZaikoRequestForSerialize(): GetZaikoRequestModel
    {
        $zaiko = new GetZaikoRequestModel();
        $getZaiko = $zaiko->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setGdid("idabc")
                          ->setSouko("111");
        return $getZaiko;
    }

    public function getZaikoRequestOK(): GetZaikoRequestModel
    {
        $zaiko = new GetZaikoRequestModel();
        $getZaiko = $zaiko->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setGdid("301")
                          ->setSouko("100");
        return $getZaiko;
    }
    public function getZaikoRequestNG(): GetZaikoRequestModel
    {
        $zaiko = new GetZaikoRequestModel();
        $getZaiko = $zaiko->setId(-1)
                          ->setGdid("idabc")
                          ->setSouko("111");
        return $getZaiko;
    }
    public function testRequestGetZaikoOK()
    {
        try {
            $getZaikoRequest = $this->getZaikoRequestOK();
            $response = (new AceClient)->makeGoodsService()
                                       ->makeGetZaikoMethod()
                                       ->withRequest($getZaikoRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetZaikoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods = $responseObj->getMaster()->getGoods();
                // $goods2 = $responseObj->getMaster()->getGoods()[1];
                // $goods3 = $responseObj->getMaster()->getGoods()[2];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(1500, $goods->getZaiko());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetZaikoNG()
    {
        try {
            $getZaikoRequest = $this->getZaikoRequestNG();
            $response = (new AceClient)->makeGoodsService()
                                       ->makeGetZaikoMethod()
                                       ->withRequest($getZaikoRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetZaikoResponseModel $responseObj */
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
