<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember\CheckDuplicationMemberRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember\MemberPrmModel;
use Plugin\AceClient\AceServices\Model\Response\Member\CheckDuplicationMember\CheckDuplicationMemberResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class CheckDuplicationMemberRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeCheckDuplicationMember()
    {
        $checkDuplicationMemberRequestModel = $this->CheckDuplicationMemberRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($checkDuplicationMemberRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <checkDuplicationMember xmlns="{$xmlns}">
                <syid>13</syid>
                <prm><![CDATA[<?xmlversion="1.0"encoding="UTF-8"?>
                    <member>
                        <name>noExistUser</name>
                        <kana>ソンザイナイ</kana>
                        <zip>399-3802</zip>
                        <adr>長野県住所2住所3住所4</adr>
                        <email>checkDuplicationMember@AceClient.v1.0</email>
                        <tel>09876543210</tel>
                    </member>
                ]]></prm>
            </checkDuplicationMember>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function CheckDuplicationMemberRequestForSerialize(): CheckDuplicationMemberRequestModel
    {
        $memberPrm = (new MemberPrmModel())
                    ->setName("noExistUser")
                    ->setKana("ソンザイナイ")
                    ->setZip("399-3802")
                    ->setAdr("長野県住所2住所3住所4")
                    ->setMail("checkDuplicationMember@AceClient.v1.0")
                    ->setTel("09876543210");
        $duplicationMember = new CheckDuplicationMemberRequestModel();
        $checkDuplicationMember = $duplicationMember->setSyid(OverviewMapper::ACE_TEST_SYID)
                                                    ->setPrm($memberPrm);
        return $checkDuplicationMember;
    }

    public function CheckDuplicationMemberRequestOK(): CheckDuplicationMemberRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setName("noExistUser")
                  ->setKana("ソンザイナイ")
                  ->setZip("399-3802")
                  ->setAdr("長野県住所2住所3住所4")
                  ->setMail("checkDuplicationMember@AceClient.v1.0")
                  ->setTel("09876543210");
        $duplicationMember = new CheckDuplicationMemberRequestModel();
        $checkDuplicationMember = $duplicationMember->setSyid(OverviewMapper::ACE_TEST_SYID)
                                                    ->setPrm($memberPrm);
        return $checkDuplicationMember;
    }
    public function CheckDuplicationMemberRequestNG(): CheckDuplicationMemberRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setName("checkDuplicationMemberTest")
                  ->setKana("ｃｈｅｃｋＤｕｐｌｉｃａｔｉｏｎＭｅｍｂｅｒＴｅｓｔ");
        $duplicationMember = new CheckDuplicationMemberRequestModel();
        $checkDuplicationMember = $duplicationMember->setSyid(OverviewMapper::ACE_TEST_SYID)
                                                    ->setPrm($memberPrm);
        return $checkDuplicationMember;
    }
    public function testRequestCheckDuplicationMemberOK()
    {
        try {
            $checkDuplicationMemberRequest = $this->CheckDuplicationMemberRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeCheckDuplicationMemberMethod()
                                        ->withRequest($checkDuplicationMemberRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var CheckDuplicationMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $message = $responseObj->getMember()->getMessage();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("OK", $message->getResult());
        $this->assertEquals("", $message->getMessage1());
    }

    public function testRequestCheckDuplicationMemberNG()
    {
        try {
            $checkDuplicationMemberRequest = $this->CheckDuplicationMemberRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeCheckDuplicationMemberMethod()
                                        ->withRequest($checkDuplicationMemberRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var CheckDuplicationMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("NG", $message->getResult());
        $this->assertEquals("", $message->getMessage1());
    }
}
