<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\DeleteSbpsCustId\DeleteSbpsCustIdRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteSbpsCustId\GetSbpsCustIdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class DeleteSbpsCustIdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeDeleteSbpsCustId()
    {
        $deleteSbpsCustIdRequestModel = $this->DeleteSbpsCustIdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($deleteSbpsCustIdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <deleteSbpsCustId xmlns="{$xmlns}">
                <syid>13</syid>
                <mbid>214</mbid>
                <ceda>1</ceda>
            </deleteSbpsCustId>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function DeleteSbpsCustIdRequestForSerialize(): DeleteSbpsCustIdRequestModel
    {
        $sbpsCustId = new DeleteSbpsCustIdRequestModel();
        $DeleteSbpsCustId = $sbpsCustId->setSyid(OverviewMapper::ACE_TEST_SYID)
                                       ->setMbid('214')
                                       ->setCeda('1');
        return $DeleteSbpsCustId;
    }

    public function DeleteSbpsCustIdRequestOK(): DeleteSbpsCustIdRequestModel
    {
        $sbpsCustId = new DeleteSbpsCustIdRequestModel();
        $DeleteSbpsCustId = $sbpsCustId->setSyid(OverviewMapper::ACE_TEST_SYID)
                                       ->setMbid('214')
                                       ->setCeda('1');
        return $DeleteSbpsCustId;
    }
    public function DeleteSbpsCustIdRequestNG(): DeleteSbpsCustIdRequestModel
    {
        $sbpsCustId = new DeleteSbpsCustIdRequestModel();
        $DeleteSbpsCustId = $sbpsCustId->setSyid(-1)
                                       ->setMbid('214')
                                       ->setCeda('1');
        return $DeleteSbpsCustId;
    }
    public function testRequestDeleteSbpsCustIdOK()
    {
        try {
            $deleteSbpsCustIdRequest = $this->DeleteSbpsCustIdRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeDeleteSbpsCustIdMethod()
                                        ->withRequest($deleteSbpsCustIdRequest)
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

        $this->assertEquals("214", $sbpscustid->getMbid());
        $this->assertEquals("1", $sbpscustid->getCeda());
        $this->assertEquals("214", $sbpscustid->getCustid());
        $this->assertContains($sbpscustid->getDay()->toShortDate(), ['2024-06-12', '6061-02-01']);

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestDeleteSbpsCustIdNG()
    {
        try {
            $DeleteSbpsCustIdRequest = $this->DeleteSbpsCustIdRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeDeleteSbpsCustIdMethod()
                                        ->withRequest($DeleteSbpsCustIdRequest)
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
        $this->assertEquals(null, $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
