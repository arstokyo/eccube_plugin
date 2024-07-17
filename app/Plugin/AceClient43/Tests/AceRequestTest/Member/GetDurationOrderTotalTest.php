<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\GetDurationOrderTotal\GetDurationOrderTotalRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal\GetDurationOrderTotalResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetDurationOrderTotalRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetDurationOrderTotal()
    {
        $getDurationOrderTotalRequestModel = $this->GetDurationOrderTotalRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getDurationOrderTotalRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getDurationOrderTotal xmlns="{$xmlns}">
                <dayfrom>20230101</dayfrom>
                <dayto>20240101</dayto>
                <syid>13</syid>
                <mbid>216</mbid>
            </getDurationOrderTotal>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function GetDurationOrderTotalRequestForSerialize(): GetDurationOrderTotalRequestModel
    {
        $durationOrderTotal = new GetDurationOrderTotalRequestModel();
        $getDurationOrderTotal = $durationOrderTotal->setSyid(OverviewMapper::ACE_TEST_SYID)
                                                    ->setMbid('216')
                                                    ->setDayfrom('20230101')
                                                    ->setDayto('20240101');
        return $getDurationOrderTotal;
    }

    public function GetDurationOrderTotalRequestOK(): GetDurationOrderTotalRequestModel
    {
        $durationOrderTotal = new GetDurationOrderTotalRequestModel();
        $getDurationOrderTotal = $durationOrderTotal->setSyid(OverviewMapper::ACE_TEST_SYID)
                                                    ->setMbid('216')
                                                    ->setDayfrom('20230101')
                                                    ->setDayto('20240101');
        return $getDurationOrderTotal;
    }
    public function GetDurationOrderTotalRequestNG(): GetDurationOrderTotalRequestModel
    {
        $durationOrderTotal = new GetDurationOrderTotalRequestModel();
        $getDurationOrderTotal = $durationOrderTotal->setSyid(-1)
                                                    ->setMbid('216')
                                                    ->setDayfrom('20230101')
                                                    ->setDayto('20240101');
        return $getDurationOrderTotal;
    }
    public function testRequestGetDurationOrderTotalOK()
    {
        try {
            $getDurationOrderTotalRequest = $this->GetDurationOrderTotalRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetDurationOrderTotalMethod()
                                        ->withRequest($getDurationOrderTotalRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetDurationOrderTotalResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $durationOrderTotal = $responseObj->getMember()->getTotal();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(0, $durationOrderTotal->getDentotal());
        $this->assertEquals(9, $durationOrderTotal->getGkbn());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetDurationOrderTotalNG()
    {
        try {
            $getDurationOrderTotalRequest = $this->GetDurationOrderTotalRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetDurationOrderTotalMethod()
                                        ->withRequest($getDurationOrderTotalRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetDurationOrderTotalResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $durationOrderTotal = $responseObj->getMember()->getTotal();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $durationOrderTotal);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
