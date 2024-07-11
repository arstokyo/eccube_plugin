<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\UpdateSbpsCustId\UpdateSbpsCustIdRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\UpdateSbpsCustId\GetSbpsCustIdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class UpdateSbpsCustIdRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeUpdateSbpsCustId()
    {
        $updateSbpsCustIdRequestModel = $this->UpdateSbpsCustIdRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($updateSbpsCustIdRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <updateSbpsCustId xmlns="{$xmlns}">
                <syid>13</syid>
                <mbid>214</mbid>
                <ceda>1</ceda>
                <custid>214</custid>
            </updateSbpsCustId>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function UpdateSbpsCustIdRequestForSerialize(): UpdateSbpsCustIdRequestModel
    {
        $sbpsCustId = new UpdateSbpsCustIdRequestModel();
        $updateSbpsCustId = $sbpsCustId->setSyid(OverviewMapper::ACE_TEST_SYID)
                                       ->setMbid('214')
                                       ->setCustid('214')
                                       ->setCeda('1');
        return $updateSbpsCustId;
    }

    public function UpdateSbpsCustIdRequestOK(): UpdateSbpsCustIdRequestModel
    {
        $sbpsCustId = new UpdateSbpsCustIdRequestModel();
        $updateSbpsCustId = $sbpsCustId->setSyid(OverviewMapper::ACE_TEST_SYID)
                                       ->setMbid('214')
                                       ->setCustid('214')
                                       ->setCeda('1');
        return $updateSbpsCustId;
    }
    public function UpdateSbpsCustIdRequestNG(): UpdateSbpsCustIdRequestModel
    {
        $sbpsCustId = new UpdateSbpsCustIdRequestModel();
        $updateSbpsCustId = $sbpsCustId->setSyid(-1)
                                       ->setMbid('214')
                                       ->setCustid('214')
                                       ->setCeda('1');
        return $updateSbpsCustId;
    }
    public function testRequestUpdateSbpsCustIdOK()
    {
        try {
            $updateSbpsCustIdRequest = $this->UpdateSbpsCustIdRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeUpdateSbpsCustIdMethod()
                                        ->withRequest($updateSbpsCustIdRequest)
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
        $this->assertNotNull($sbpscustid->getDay()->toDateTime());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestUpdateSbpsCustIdNG()
    {
        try {
            $UpdateSbpsCustIdRequest = $this->UpdateSbpsCustIdRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeUpdateSbpsCustIdMethod()
                                        ->withRequest($UpdateSbpsCustIdRequest)
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
