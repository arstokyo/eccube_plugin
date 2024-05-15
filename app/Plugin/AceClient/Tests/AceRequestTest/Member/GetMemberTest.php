<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\GetMember\GetMemberRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetMember\GetMemberResponseModel;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Serialize;

class GetMemberTest extends AbstractAdminWebTestCase
{
    private ?string $userId = 'GetMemberTestUser';
    private ?string $passWd = 'GetMemberTestPassword';

    public function testSearializeGetMember()
    {
        $getMemberRequestModel = $this->getModelRequest();
        $serializer = Serialize\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemberRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serialize\SoapXMLSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMember xmlns="{$xmlns}">
                <id>13</id>
                <userid>GetMemberTestUser</userid>
                <passwd>GetMemberTestPassword</passwd>
            </getMember>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function getModelRequest()
    {
        return (new GetmemberRequestModel())
                ->setId(OverviewMapper::ACE_TEST_SYID)
                ->setUserId($this->userId)
                ->setPassWd($this->passWd);
    }

    public function testRequestGetMemberOK()
    {
        try {
            $getMemberRequest = $this->getModelRequest();
            $response = (new AceClient)->makeMemberService()
                                       ->makeGetMemberMethod()
                                       ->withRequest($getMemberRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $member = $responseObj->getLoginMember()->getMember();
                $reminder = $responseObj->getLoginMember()->getReminder();
                $stpoint = $responseObj->getLoginMember()->getSTPoint();
                $orderinfo = $responseObj->getLoginMember()->getOrderInfo();
                $message = $responseObj->getLoginMember()->getMessage();
                $message1 = $responseObj->getLoginMember()->getMessage()->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals('OK', $message->getResult());
        $this->assertEquals('', $message->getMessage1());
        $this->assertEquals('', $message->getMessage2());


        $this->assertEquals('107', $member->getCode());
        $this->assertEquals('GetMemberTest', $member->getSimei());
        $this->assertEquals('ＧｅｔＭｅｍｂｅｒＴｅｓｔ', $member->getKana());
        $this->assertEquals('0', $member->getDmkbn());
        $this->assertEquals('101-0032', $member->getZip());
        $this->assertEquals('東京都', $member->getAdr1());
        $this->assertEquals('千代田区', $member->getAdr2());
        $this->assertEquals('岩本町', $member->getAdr3());
        $this->assertEquals('１丁目９−５', $member->getAdr4());
        $this->assertEquals('090444333', $member->getTel());
        $this->assertEquals('222444222', $member->getFax());
        $this->assertEquals('0358111864', $member->getTel2());
        $this->assertEquals('13101', $member->getArea());
        $this->assertEquals(null, $member->getCbar());
        $this->assertEquals('0', $member->getDadr());
        $this->assertEquals('0', $member->getGadr());
        $this->assertEquals(null, $member->getCode2());
        $this->assertEquals('1', $member->getTankakbn());
        $this->assertEquals('0', $member->getSex());
        $this->assertEquals('1932-04-01', $member->getBirthday()->toShortDate());
        $this->assertEquals(null, $member->getAge());
        $this->assertEquals('1', $member->getBlkbn());
        $this->assertEquals('2024-05-10', $member->getBlday()->toShortDate());
        $this->assertEquals('100', $member->getBaitai());
        $this->assertEquals('媒体１００番', $member->getBaitaiName());
        $this->assertEquals('100', $member->getBaifile());
        $this->assertEquals('媒体管理１００番', $member->getBaifileName());
        $this->assertEquals(null, $member->getFree1());
        $this->assertEquals(null, $member->getFree2());
        $this->assertEquals(null, $member->getFree3());
        $this->assertEquals(null, $member->getFday1());
        $this->assertEquals(null, $member->getFday2());
        $this->assertEquals(null, $member->getFday3());
        $this->assertEquals('https://www.ar-system.co.jp/', $member->getFmemo1());
        $this->assertEquals(null, $member->getFmemo2());
        $this->assertEquals('住所メモー1', $member->getFmemo3());
        $this->assertEquals('1001', $member->getFcode1());
        $this->assertEquals('1011', $member->getFcode2());
        $this->assertEquals(null, $member->getFcode3());
        $this->assertEquals(null, $member->getFname1());
        $this->assertEquals(null, $member->getFname2());
        $this->assertEquals(null, $member->getFname3());
        $this->assertEquals('108', $member->getUpcode());
        $this->assertEquals('GetMemberUpCodeTest', $member->getUpcodeSimei());
        $this->assertEquals('mailadress1@AceClient.v.1.0', $member->getMail());
        $this->assertEquals('FKビル5階', $member->getBikou1());
        $this->assertEquals('エーアールシステム株式会社', $member->getBikou2());
        $this->assertEquals(null, $member->getBikou3());
        $this->assertEquals('mailadress1@AceClient.v.1.0', $member->getMail1());
        $this->assertEquals('1', $member->getPckbn1());
        $this->assertEquals('0', $member->getKeikbn1());
        $this->assertEquals('1', $member->getMelmaga1());
        $this->assertEquals('mailadress3@AceClient.v.1.0', $member->getMail2());
        $this->assertEquals('1', $member->getPckbn2());
        $this->assertEquals('0', $member->getKeikbn2());
        $this->assertEquals('1', $member->getMelmaga2());
        $this->assertEquals('mailadress4@AceClient.v.1.0', $member->getMail3());
        $this->assertEquals('0', $member->getPckbn3());
        $this->assertEquals('1', $member->getKeikbn3());
        $this->assertEquals('0', $member->getMelmaga3());
        $this->assertEquals('mailadress2@AceClient.v.1.0', $member->getMail4());
        $this->assertEquals('0', $member->getPckbn4());
        $this->assertEquals('1', $member->getKeikbn4());
        $this->assertEquals('0', $member->getMelmaga4());
        $this->assertEquals('mailadress5@AceClient.v.1.0', $member->getMail5());
        $this->assertEquals('0', $member->getPckbn5());
        $this->assertEquals('1', $member->getKeikbn5());
        $this->assertEquals('0', $member->getMelmaga5());
        $this->assertEquals('GetMemberTestUser', $member->getUserid());
        $this->assertEquals('0', $member->getTaikai());
        $this->assertEquals('1', $member->getTorikbn());
        $this->assertEquals('25', $member->getSime());
        $this->assertEquals('0', $member->getSite());
        $this->assertEquals('15', $member->getInday());
        $this->assertEquals('107', $member->getIcode());
        $this->assertEquals('0.015', $member->getRitu());
        $this->assertEquals('2', $member->getKhasuu());

        $this->assertEquals('107', $reminder->getCode());
        $this->assertEquals('question_01', $reminder->getQuestion1());
        $this->assertEquals('answer_01', $reminder->getAnswer1());
        $this->assertEquals('question_02', $reminder->getQuestion2());
        $this->assertEquals('answer_02', $reminder->getAnswer2());
        $this->assertEquals('question_03', $reminder->getQuestion3());
        $this->assertEquals('answer_03', $reminder->getAnswer3());
        $this->assertEquals('question_04', $reminder->getQuestion4());
        $this->assertEquals('answer_04', $reminder->getAnswer4());
        $this->assertEquals('question_05', $reminder->getQuestion5());
        $this->assertEquals('answer_05', $reminder->getAnswer5());
        $this->assertEquals('question_06', $reminder->getQuestion6());
        $this->assertEquals('answer_06', $reminder->getAnswer6());
        $this->assertEquals('question_07', $reminder->getQuestion7());
        $this->assertEquals('answer_07', $reminder->getAnswer7());

        $this->assertEquals(null, $stpoint->getIday());
        $this->assertEquals('', $stpoint->getInppointMaxday());
        $this->assertEquals('0', $stpoint->getPoint());

        $this->assertEquals('0', $orderinfo->getNomoneyFlg());
        $this->assertEquals('0', $orderinfo->getOrderCnt());
        $this->assertEquals('', $orderinfo->getOrderMaxday());

    }

    public function testGetMemberWrongPassWd()
    {
        $this->passWd = 'WrongPassWd';
        try {
            $getMemberRequest = $this->getModelRequest();
            $response = (new AceClient)->makeMemberService()
                                       ->makeGetMemberMethod()
                                       ->withRequest($getMemberRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $result = $responseObj->getLoginMember()->getMessage()->getResult();
                $message1 = $responseObj->getLoginMember()->getMessage()->getMessage1();
                $message2 = $responseObj->getLoginMember()->getMessage()->getMessage2();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals('NG', $result);
        $this->assertEquals('パスワードが違います', $message1);
        $this->assertStringStartsWith('select', $message2);
    }

    public function testGetMemberNotExistsUsr()
    {
        $this->userId = 'thisUserNotExists@AceClient.v.1.0';
        try {
            $getMemberRequest = $this->getModelRequest();
            $response = (new AceClient)->makeMemberService()
                                       ->makeGetMemberMethod()
                                       ->withRequest($getMemberRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $result = $responseObj->getLoginMember()->getMessage()->getResult();
                $message1 = $responseObj->getLoginMember()->getMessage()->getMessage1();
                $message2 = $responseObj->getLoginMember()->getMessage()->getMessage2();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals('NG', $result);
        $this->assertEquals('入力されたログインＩＤは登録されていません。', $message1);
        $this->assertStringStartsWith('select', $message2);
    }

}