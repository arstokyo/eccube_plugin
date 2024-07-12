<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Goods;

use Plugin\AceClient43\AceServices\Model\Request\Goods\GetGtanka\GetGtankaRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGtanka\GetGtankaResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;

class GetGtankaRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetGtanka()
    {
        $getGtankaRequestModel = $this->getGtankaRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getGtankaRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGtanka xmlns="{$xmlns}">
                <id>13</id>
                <execDateFrom>2024/05/24 17:00:00</execDateFrom>
                <execDateTo>2024/05/24 17:05:00</execDateTo>
            </getGtanka>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getGtankaRequestForSerialize(): GetGtankaRequestModel
    {
        $Gtanka = new GetGtankaRequestModel();
        $getGtanka = $Gtanka->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setExecDateFrom("2024/05/24 17:00:00")
                          ->setExecDateTo("2024/05/24 17:05:00");
        return $getGtanka;
    }

    public function getGtankaRequestOK(): GetGtankaRequestModel
    {
        $Gtanka = new GetGtankaRequestModel();
        $getGtanka = $Gtanka->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setExecDateFrom("2024/05/24 17:00:00")
                          ->setExecDateTo("2024/05/24 17:05:00");
        return $getGtanka;
    }
    public function getGtankaRequestNG(): GetGtankaRequestModel
    {
        $Gtanka = new GetGtankaRequestModel();
        $getGtanka = $Gtanka->setId(-1);
        return $getGtanka;
    }
    public function testRequestGetGtankaOK()
    {
        try {
            $getGtankaRequest = $this->getGtankaRequestOK();
            $response = $this->aceClient->makeGoodsService()
                                       ->makeGetGtankaMethod()
                                       ->withRequest($getGtankaRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGtankaResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods1 = $responseObj->getMaster()->getGzai()[0];
                $goods2 = $responseObj->getMaster()->getGzai()[1];
                $goods3 = $responseObj->getMaster()->getGzai()[2];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("350", $goods1->getGdid());
        $this->assertEquals(1, $goods1->getTankakbn());
        $this->assertEquals("2024-05-24", $goods1->getDay()->toShortDate());
        $this->assertEquals(10, $goods1->getTaxrate());
        $this->assertEquals(9000, $goods1->getInctanka());
        $this->assertEquals(8182, $goods1->getRevtanka());
        $this->assertEquals(1, $goods1->getTaxkbn());
        $this->assertEquals("0", $goods1->getPoint());
        $this->assertEquals("単価１備考", $goods1->getNote());
        $this->assertEquals(null, $goods1->getNday());
        $this->assertEquals(0, $goods1->getNtaxrate());
        $this->assertEquals(0, $goods1->getNinctanka());
        $this->assertEquals(0, $goods1->getNrevtanka());
        $this->assertEquals(null, $goods1->getNtaxkbn());
        $this->assertEquals(null, $goods1->getNpoint());
        $this->assertEquals("", $goods1->getNnote());

        $this->assertEquals("350", $goods2->getGdid());
        $this->assertEquals(2, $goods2->getTankakbn());
        $this->assertEquals("2024-05-24", $goods2->getDay()->toShortDate());
        $this->assertEquals(10, $goods2->getTaxrate());
        $this->assertEquals(1000, $goods2->getInctanka());
        $this->assertEquals(910, $goods2->getRevtanka());
        $this->assertEquals(1, $goods2->getTaxkbn());
        $this->assertEquals("0", $goods2->getPoint());
        $this->assertEquals("単価２備考", $goods2->getNote());
        $this->assertEquals(null, $goods2->getNday());
        $this->assertEquals(0, $goods2->getNtaxrate());
        $this->assertEquals(0, $goods2->getNinctanka());
        $this->assertEquals(0, $goods2->getNrevtanka());
        $this->assertEquals(null, $goods2->getNtaxkbn());
        $this->assertEquals(null, $goods2->getNpoint());
        $this->assertEquals("", $goods2->getNnote());

        $this->assertEquals("350", $goods3->getGdid());
        $this->assertEquals(3, $goods3->getTankakbn());
        $this->assertEquals("2024-05-24", $goods3->getDay()->toShortDate());
        $this->assertEquals(10, $goods3->getTaxrate());
        $this->assertEquals(2000, $goods3->getInctanka());
        $this->assertEquals(1819, $goods3->getRevtanka());
        $this->assertEquals(1, $goods3->getTaxkbn());
        $this->assertEquals("0", $goods3->getPoint());
        $this->assertEquals("単価３備考", $goods3->getNote());
        $this->assertEquals(null, $goods3->getNday());
        $this->assertEquals(0, $goods3->getNtaxrate());
        $this->assertEquals(0, $goods3->getNinctanka());
        $this->assertEquals(0, $goods3->getNrevtanka());
        $this->assertEquals(null, $goods3->getNtaxkbn());
        $this->assertEquals(null, $goods3->getNpoint());
        $this->assertEquals("", $goods3->getNnote());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetGtankaNG()
    {
        try {
            $getGtankaRequest = $this->getGtankaRequestNG();
            $response = $this->aceClient->makeGoodsService()
                                       ->makeGetGtankaMethod()
                                       ->withRequest($getGtankaRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGtankaResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goods = $responseObj->getMaster()->getGzai();
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
