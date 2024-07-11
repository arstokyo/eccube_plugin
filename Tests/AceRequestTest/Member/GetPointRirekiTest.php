<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\GetPointRireki\GetPointRirekiRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPointRireki\GetPointRirekiResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetPointRirekiRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetPointRireki()
    {
        $getPointRirekiRequestModel = $this->GetPointRirekiRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getPointRirekiRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getPointRireki xmlns="{$xmlns}">
                <syid>13</syid>
                <jmemid>213</jmemid>
            </getPointRireki>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function GetPointRirekiRequestForSerialize(): GetPointRirekiRequestModel
    {
        $holiday = new GetPointRirekiRequestModel();
        $GetPointRireki = $holiday->setSyid(OverviewMapper::ACE_TEST_SYID)
                                  ->setJmemid('213');
        return $GetPointRireki;
    }

    public function GetPointRirekiRequestOK(): GetPointRirekiRequestModel
    {
        $holiday = new GetPointRirekiRequestModel();
        $GetPointRireki = $holiday->setSyid(OverviewMapper::ACE_TEST_SYID)
                                  ->setJmemid('213');
        return $GetPointRireki;
    }
    public function GetPointRirekiRequestNG(): GetPointRirekiRequestModel
    {
        $holiday = new GetPointRirekiRequestModel();
        $GetPointRireki = $holiday->setSyid(-1)
                                  ->setJmemid('213');
        return $GetPointRireki;
    }
    public function testRequestGetPointRirekiOK()
    {
        try {
            $GetPointRirekiRequest = $this->GetPointRirekiRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetPointRirekiMethod()
                                        ->withRequest($GetPointRirekiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPointRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $pointrireki1 = $responseObj->getMember()->getPoint()[0];
                $pointrireki2 = $responseObj->getMember()->getPoint()[1];
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(1, $pointrireki1->getKubun());
        $this->assertEquals(27, $pointrireki1->getDenno());
        $this->assertEquals(0, $pointrireki1->getNouno());
        $this->assertEquals(0, $pointrireki1->getEdano());
        $this->assertEquals(97, $pointrireki1->getBrid());
        $this->assertEquals(10, $pointrireki1->getUsekbn());
        $this->assertEquals(13, $pointrireki1->getMsyid());
        $this->assertEquals("213", $pointrireki1->getJmemid());
        $this->assertEquals("2024-06-11", $pointrireki1->getJday()->toShortdate());
        $this->assertEquals("2024-06-11", $pointrireki1->getDay()->toShortdate());
        $this->assertEquals("100", $pointrireki1->getPoint());
        $this->assertEquals("thong", $pointrireki1->getCuser());
        $this->assertEquals("thong", $pointrireki1->getUuser());

        $this->assertEquals(1, $pointrireki2->getKubun());
        $this->assertEquals(1, $pointrireki2->getDenno());
        $this->assertEquals(0, $pointrireki2->getNouno());
        $this->assertEquals(0, $pointrireki2->getEdano());
        $this->assertEquals(1, $pointrireki2->getBrid());
        $this->assertEquals(10, $pointrireki2->getUsekbn());
        $this->assertEquals(13, $pointrireki2->getMsyid());
        $this->assertEquals("213", $pointrireki2->getJmemid());
        $this->assertEquals("2024-05-23", $pointrireki2->getJday()->toShortdate());
        $this->assertEquals("2024-05-23", $pointrireki2->getDay()->toShortdate());
        $this->assertEquals("1000", $pointrireki2->getPoint());
        $this->assertEquals("thong", $pointrireki2->getCuser());
        $this->assertEquals("thong", $pointrireki2->getUuser());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetPointRirekiNG()
    {
        try {
            $GetPointRirekiRequest = $this->GetPointRirekiRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetPointRirekiMethod()
                                        ->withRequest($GetPointRirekiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPointRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $pointrireki = $responseObj->getMember()->getPoint();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $pointrireki);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
