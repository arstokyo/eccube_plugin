<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode\GetMemberMcodeRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode\GetMemberMcodeResponseModel;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;

class GetMemberMcodeTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemberMcode()
    {
        $GetMemberMcodeRequestModel = $this->getModelRequest();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($GetMemberMcodeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()["@xmlns"] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS["@xmlns"];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemberMcode xmlns="{$xmlns}">
                <id>13</id>
                <mcode>203</mcode>
            </getMemberMcode>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace("/\s+/", "", $expectedData), preg_replace("/\s+/", "", $serializedData));
    }

    public function getModelRequest()
    {
        return (new GetMemberMcodeRequestModel())
                ->setId(OverviewMapper::ACE_TEST_SYID)
                ->setMcode("203");
    }
    public function GetMemberMcodeRequestOK(): GetMemberMcodeRequestModel
    {
        $memberMcode = new GetMemberMcodeRequestModel();
        $GetMemberMcode = $memberMcode->setId(OverviewMapper::ACE_TEST_SYID)
                                      ->setMcode("204");
        return $GetMemberMcode;
    }
    public function GetMemberMcodeRequestNG(): GetMemberMcodeRequestModel
    {
        $memberMcode = new GetMemberMcodeRequestModel();
        $GetMemberMcode = $memberMcode->setId(-1)
                                      ->setMcode("204");
        return $GetMemberMcode;
    }
    public function testRequestGetMemberMcodeOK()
    {
        try {
            $getMemberMcodeRequest = $this->GetMemberMcodeRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetMemberMcodeMethod()
                                        ->withRequest($getMemberMcodeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberMcodeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $member = $responseObj->getLoginMember()->getMember();
                $reminder = $responseObj->getLoginMember()->getReminder();
                $stpoint = $responseObj->getLoginMember()->getSTPoint();
                $orderinfo = $responseObj->getLoginMember()->getOrderInfo();
                $message = $responseObj->getLoginMember()->getMessage();
                $message1 = $responseObj->getLoginMember()->getMessage()->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? "One Error Occurred when sending request.";
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? "One Error Occurred when sending request.";
        }

        $this->assertEquals("204", $member->getCode());
        $this->assertEquals("GetMemberMcodeTest", $member->getSimei());
        $this->assertEquals("GetMemberMcodeTest", $member->getKana());
        $this->assertEquals("0", $member->getDmkbn());
        $this->assertEquals("116-0013", $member->getZip());
        $this->assertEquals("山梨県", $member->getAdr1());
        $this->assertEquals("荒川区", $member->getAdr2());
        $this->assertEquals("西日暮里", $member->getAdr3());
        $this->assertEquals("", $member->getAdr4());
        $this->assertEquals("131314288", $member->getTel());
        $this->assertEquals("", $member->getFax());
        $this->assertEquals("", $member->getTel2());
        $this->assertEquals("13118", $member->getArea());
        $this->assertEquals("", $member->getCbar());
        $this->assertEquals(0, $member->getDadr());
        $this->assertEquals(0, $member->getGadr());
        $this->assertEquals("", $member->getCode2());
        $this->assertEquals("1", $member->getTankakbn());
        $this->assertEquals(0, $member->getSex());
        $this->assertEquals(null, $member->getBirthday());
        $this->assertEquals(null, $member->getAge());
        $this->assertEquals(0, $member->getBlkbn());
        $this->assertEquals("2024-07-29", $member->getBlday()->toShortDate());
        $this->assertEquals("", $member->getBaitai());
        $this->assertEquals("", $member->getBaitaiName());
        $this->assertEquals("", $member->getBaifile());
        $this->assertEquals("", $member->getBaifileName());
        $this->assertEquals("", $member->getFree1());
        $this->assertEquals("", $member->getFree2());
        $this->assertEquals("", $member->getFree3());
        $this->assertEquals(null, $member->getFday1());
        $this->assertEquals(null, $member->getFday2());
        $this->assertEquals(null, $member->getFday3());
        $this->assertEquals("", $member->getFmemo1());
        $this->assertEquals("", $member->getFmemo2());
        $this->assertEquals("", $member->getFmemo3());
        $this->assertEquals("", $member->getFcode1());
        $this->assertEquals("", $member->getFcode2());
        $this->assertEquals("", $member->getFcode3());
        $this->assertEquals("", $member->getFname1());
        $this->assertEquals("", $member->getFname2());
        $this->assertEquals("", $member->getFname3());
        $this->assertEquals("", $member->getUpcode());
        $this->assertEquals("", $member->getUpcodeSimei());
        $this->assertEquals("GetMemberMcodeTest@AceClient.v1.0", $member->getMail());
        $this->assertEquals("", $member->getBikou1());
        $this->assertEquals("", $member->getBikou2());
        $this->assertEquals("", $member->getBikou3());
        $this->assertEquals("GetMemberMcodeTest@AceClient.v1.0", $member->getMail1());
        $this->assertEquals("1", $member->getPckbn1());
        $this->assertEquals("0", $member->getKeikbn1());
        $this->assertEquals("1", $member->getMelmaga1());
        $this->assertEquals("RegMemwebEmailTest@AceClient.v1.0", $member->getMail2());
        $this->assertEquals(1, $member->getPckbn2());
        $this->assertEquals(null, $member->getKeikbn2());
        $this->assertEquals(1, $member->getMelmaga2());
        $this->assertEquals("test@gmail.com", $member->getMail3());
        $this->assertEquals(1, $member->getPckbn3());
        $this->assertEquals(null, $member->getKeikbn3());
        $this->assertEquals(1, $member->getMelmaga3());
        $this->assertEquals("", $member->getMail4());
        $this->assertEquals(null, $member->getPckbn4());
        $this->assertEquals(null, $member->getKeikbn4());
        $this->assertEquals("", $member->getMelmaga4());
        $this->assertEquals("", $member->getMail5());
        $this->assertEquals(null, $member->getPckbn5());
        $this->assertEquals(null, $member->getKeikbn5());
        $this->assertEquals("", $member->getMelmaga5());
        $this->assertEquals("GetMemberMcodeTest@AceClient.v1.0", $member->getUserid());
        $this->assertEquals(2, $member->getTaikai());
        $this->assertEquals("1", $member->getTorikbn());
        $this->assertEquals(12, $member->getSime());
        $this->assertEquals(1, $member->getSite());
        $this->assertEquals(6, $member->getInday());
        $this->assertEquals("204", $member->getIcode());
        $this->assertEquals("0", $member->getRitu());
        $this->assertEquals(0, $member->getKhasuu());

        $this->assertEquals("204", $reminder->getCode());
        $this->assertEquals("questiontest_01", $reminder->getQuestion1());
        $this->assertEquals("answertest_01", $reminder->getAnswer1());
        $this->assertEquals("questiontest_02", $reminder->getQuestion2());
        $this->assertEquals("answertest_02", $reminder->getAnswer2());
        $this->assertEquals("questiontest_03", $reminder->getQuestion3());
        $this->assertEquals("answertest_03", $reminder->getAnswer3());
        $this->assertEquals("questiontest_04", $reminder->getQuestion4());
        $this->assertEquals("answertest_04", $reminder->getAnswer4());
        $this->assertEquals("questiontest_05", $reminder->getQuestion5());
        $this->assertEquals("answertest_05", $reminder->getAnswer5());
        $this->assertEquals("questiontest_06", $reminder->getQuestion6());
        $this->assertEquals("answertest_06", $reminder->getAnswer6());
        $this->assertEquals("questiontest_07", $reminder->getQuestion7());
        $this->assertEquals("answertest_07", $reminder->getAnswer7());

        $this->assertEquals("", $stpoint->getIday());
        $this->assertEquals("", $stpoint->getInppointMaxday());
        $this->assertEquals("0", $stpoint->getPoint());

        $this->assertEquals("0", $orderinfo->getNomoneyFlg());
        $this->assertEquals("0", $orderinfo->getOrderCnt());
        $this->assertEquals("", $orderinfo->getOrderMaxday());

        $this->assertEquals("OK", $message->getResult());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemberMcodeNG()
    {
        try {
            $getMemberMcodeRequest = $this->GetMemberMcodeRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetMemberMcodeMethod()
                                        ->withRequest($getMemberMcodeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberMcodeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message = $responseObj->getLoginMember()->getMessage();
                $message1 = $responseObj->getLoginMember()->getMessage()->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? "One Error Occurred when sending request.";
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? "One Error Occurred when sending request.";
        }

        $this->assertEquals("NG", $message->getResult());
        $this->assertEquals(null, $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}