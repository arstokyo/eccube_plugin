<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberName\GetMemberNameRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberName\GetMemberNameResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemberNameRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemberName()
    {
        $GetMemberNameRequestModel = $this->GetMemberNameRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($GetMemberNameRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemberName xmlns="{$xmlns}">
                <syid>13</syid>
                <mbid>1234</mbid>
            </getMemberName>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemberNameRequestForSerialize(): GetMemberNameRequestModel
    {
        $memberName = new GetMemberNameRequestModel();
        $GetMemberName = $memberName->setSyid(OverviewMapper::ACE_TEST_SYID)
                                    ->setMbid("1234");
        return $GetMemberName;
    }

    public function GetMemberNameRequestOK(): GetMemberNameRequestModel
    {
        $memberName = new GetMemberNameRequestModel();
        $GetMemberName = $memberName->setSyid(OverviewMapper::ACE_TEST_SYID)
                                    ->setMbid("203");
        return $GetMemberName;
    }
    public function GetMemberNameRequestNG(): GetMemberNameRequestModel
    {
        $memberName = new GetMemberNameRequestModel();
        $GetMemberName = $memberName->setSyid(-1)
                                    ->setMbid("203");
        return $GetMemberName;
    }
    public function testRequestGetMemberNameOK()
    {
        try {
            $getMemberNameRequest = $this->GetMemberNameRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetMemberNameMethod()
                                        ->withRequest($getMemberNameRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberNameResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $member = $responseObj->getMember()->getMember();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals('203', $member->getMbid());
        $this->assertEquals("GetMemberNameTest", $member->getName());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemberNameNG()
    {
        try {
            $getMemberNameRequest = $this->GetMemberNameRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetMemberNameMethod()
                                        ->withRequest($getMemberNameRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberNameResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $member = $responseObj->getMember()->getMember();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $member);
        $this->assertEquals(null, $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
