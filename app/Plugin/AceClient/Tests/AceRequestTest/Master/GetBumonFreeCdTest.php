<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBumonFreeCd\GetBumonFreeCdRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreeCd\GetBumonFreeCdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBumonFreeCdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBumonFreeCd()
    {
        $getBumonFreeCdRequestModel = $this->GetBumonFreeCdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getBumonFreeCdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBumonFreeCd xmlns="{$xmlns}">
                <id>13</id>
            </getBumonFreeCd>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBumonFreeCdRequestForSerialize(): GetBumonFreeCdRequestModel
    {
        $freecd = new GetBumonFreeCdRequestModel();
        $getBumonFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFreeCd;
    }

    public function GetBumonFreeCdRequestOK(): GetBumonFreeCdRequestModel
    {
        $freecd = new GetBumonFreeCdRequestModel();
        $getBumonFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFreeCd;
    }
    public function GetBumonFreeCdRequestNG(): GetBumonFreeCdRequestModel
    {
        $freecd = new GetBumonFreeCdRequestModel();
        $getBumonFreeCd = $freecd->setId(-1);
        return $getBumonFreeCd;
    }
    public function testRequestGetBumonFreeCdOK()
    {
        try {
            $getBumonFreeCdRequest = $this->GetBumonFreeCdRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreeCdMethod()
                                        ->withRequest($getBumonFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreeCdResponseModel $responseObj */
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

        $this->assertEquals(111001, $freecd1->getKubun());
        $this->assertEquals("888888", $freecd1->getFcid());
        $this->assertEquals("EC売上部門", $freecd1->getName());
        $this->assertEquals("ノート１", $freecd1->getNote1());
        $this->assertEquals("ノート２", $freecd1->getNote2());
        $this->assertEquals("ノート３", $freecd1->getNote3());

        $this->assertEquals(111001, $freecd2->getKubun());
        $this->assertEquals("999999", $freecd2->getFcid());
        $this->assertEquals("店舗売上部門", $freecd2->getName());
        $this->assertEquals("ノート１", $freecd2->getNote1());
        $this->assertEquals("ノート２", $freecd2->getNote2());
        $this->assertEquals("ノート３", $freecd2->getNote3());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBumonFreeCdNG()
    {
        try {
            $getBumonFreeCdRequest = $this->GetBumonFreeCdRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreeCdMethod()
                                        ->withRequest($getBumonFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreeCdResponseModel $responseObj */
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
