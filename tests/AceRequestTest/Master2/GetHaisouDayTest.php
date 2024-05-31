<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Plugin\AceClient\AceServices\Model\Request\Master2\GetHaisouDay;
use Plugin\AceClient\AceServices\Model\Response\Master2\GetHaisouDay\GetHaisouDayResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class GetHaisouDayTest extends AceRequestTestAbtract
{

    public function getHaisouDayRequestModel(): GetHaisouDay\GetHaisouDayRequestModel
    {
        return (new GetHaisouDay\GetHaisouDayRequestModel())
                ->setId(OverviewMapper::ACE_TEST_SYID)
                ->setSouko(200)
                ->setHcode(90)
                ->setZip('999-999');
    }   
    public function testRequestHaisouDayOK()
    {
        $message1 = null;
        try {
            $getHaisoDayRequest = $this->getHaisouDayRequestModel();
            $response = $this->aceClient->makeMaster2Service()
                                        ->makeGetHaisouDayMethod()
                                        ->withRequest($getHaisoDayRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHaisouDayResponseModel $responseObj */
                $responseObj = $response->getResponse();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertNull($message1);
        $this->assertEquals(3, $responseObj->getDay());
        
    }

    public function testSerializeGetHaisouDay()
    {
        $getReminderRequestModel = $this->getHaisouDayRequestModel();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getReminderRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getHaisouDay xmlns="{$xmlns}">
                <souko>200</souko>
                <id>13</id>
                <hcode>90</hcode>
                <zip>999-999</zip>
            </getHaisouDay>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }
    
}