<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetMemberFreeCd\GetMemberFreeCdRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFreeCd\GetMemberFreeCdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemberFreeCdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemberFreeCd()
    {
        $getMemberFreeCdRequestModel = $this->GetMemberFreeCdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemberFreeCdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemberFreeCd xmlns="{$xmlns}">
                <id>13</id>
            </getMemberFreeCd>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemberFreeCdRequestForSerialize(): GetMemberFreeCdRequestModel
    {
        $freecd = new GetMemberFreeCdRequestModel();
        $getMemberFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemberFreeCd;
    }

    public function GetMemberFreeCdRequestOK(): GetMemberFreeCdRequestModel
    {
        $freecd = new GetMemberFreeCdRequestModel();
        $getMemberFreeCd = $freecd->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemberFreeCd;
    }
    public function GetMemberFreeCdRequestNG(): GetMemberFreeCdRequestModel
    {
        $freecd = new GetMemberFreeCdRequestModel();
        $getMemberFreeCd = $freecd->setId(-1);
        return $getMemberFreeCd;
    }
    public function testRequestGetMemberFreeCdOK()
    {
        try {
            $getMemberFreeCdRequest = $this->GetMemberFreeCdRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreeCdMethod()
                                        ->withRequest($getMemberFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreeCdResponseModel $responseObj */
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

        $this->assertEquals(101100, $freecd1->getKubun());
        $this->assertEquals("1001", $freecd1->getFcid());
        $this->assertEquals("フリーコード1001", $freecd1->getName());
        $this->assertEquals("フリーコード101備考1", $freecd1->getNote1());
        $this->assertEquals("", $freecd1->getNote2());
        $this->assertEquals("", $freecd1->getNote3());

        $this->assertEquals(101101, $freecd2->getKubun());
        $this->assertEquals("1011", $freecd2->getFcid());
        $this->assertEquals("フリーコード1011", $freecd2->getName());
        $this->assertEquals("フリーコード1011備考1", $freecd2->getNote1());
        $this->assertEquals("", $freecd2->getNote2());
        $this->assertEquals("", $freecd2->getNote3());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemberFreeCdNG()
    {
        try {
            $getMemberFreeCdRequest = $this->GetMemberFreeCdRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreeCdMethod()
                                        ->withRequest($getMemberFreeCdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreeCdResponseModel $responseObj */
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
