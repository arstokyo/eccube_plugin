<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\GetSbpsCustId\GetSbpsCustIdRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetSbpsCustId\GetSbpsCustIdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetSbpsCustIdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetSbpsCustId()
    {
        $getSbpsCustIdRequestModel = $this->GetSbpsCustIdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getSbpsCustIdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getSbpsCustId xmlns="{$xmlns}">
                <syid>13</syid>
                <mbid>213</mbid>
            </getSbpsCustId>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function GetSbpsCustIdRequestForSerialize(): GetSbpsCustIdRequestModel
    {
        $sbpsCustId = new GetSbpsCustIdRequestModel();
        $GetSbpsCustId = $sbpsCustId->setSyid(OverviewMapper::ACE_TEST_SYID)
                                  ->setMbid('213');
        return $GetSbpsCustId;
    }

    public function GetSbpsCustIdRequestOK(): GetSbpsCustIdRequestModel
    {
        $sbpsCustId = new GetSbpsCustIdRequestModel();
        $GetSbpsCustId = $sbpsCustId->setSyid(OverviewMapper::ACE_TEST_SYID)
                                  ->setMbid('213');
        return $GetSbpsCustId;
    }
    public function GetSbpsCustIdRequestNG(): GetSbpsCustIdRequestModel
    {
        $sbpsCustId = new GetSbpsCustIdRequestModel();
        $GetSbpsCustId = $sbpsCustId->setSyid(-1)
                                  ->setMbid('213');
        return $GetSbpsCustId;
    }
    public function testRequestGetSbpsCustIdOK()
    {
        try {
            $getSbpsCustIdRequest = $this->GetSbpsCustIdRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetSbpsCustIdMethod()
                                        ->withRequest($getSbpsCustIdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetSbpsCustIdResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getGetSbpsCustId()->getMessage()->getMessage1();
                $sbpscustid1 = $responseObj->getGetSbpsCustId()->getSbpscustid()[0];
                $sbpscustid2 = $responseObj->getGetSbpsCustId()->getSbpscustid()[1];
                $message = $responseObj->getGetSbpsCustId()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("213", $sbpscustid1->getMbid());
        $this->assertEquals("3", $sbpscustid1->getCeda());
        $this->assertEquals("213", $sbpscustid1->getCustid());
        $this->assertEquals("2024-06-11", $sbpscustid1->getDay()->toShortDate());

        $this->assertEquals("213", $sbpscustid2->getMbid());
        $this->assertEquals("2", $sbpscustid2->getCeda());
        $this->assertEquals("213", $sbpscustid2->getCustid());
        $this->assertEquals("2024-06-11", $sbpscustid2->getDay()->toShortDate());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetSbpsCustIdNG()
    {
        try {
            $GetSbpsCustIdRequest = $this->GetSbpsCustIdRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetSbpsCustIdMethod()
                                        ->withRequest($GetSbpsCustIdRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetSbpsCustIdResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getGetSbpsCustId()->getMessage()->getMessage1();
                $sbpscustid = $responseObj->getGetSbpsCustId()->getSbpscustid();
                $message = $responseObj->getGetSbpsCustId()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $sbpscustid);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
