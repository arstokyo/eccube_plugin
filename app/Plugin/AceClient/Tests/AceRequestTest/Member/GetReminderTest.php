<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\GetReminder\GetReminderRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetReminder\GetReminderResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class GetReminderRequestModelTest extends AceRequestTestAbtract
{
    private ?string $checkMail = 'GetReminderTest@AceClient.v.1.0';
    public function testCallGetReminderRequestModel()
    {
        $mail = new GetReminderRequestModel();
        $mail->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress($this->checkMail);
        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $mail->getId());
        $this->assertEquals($this->checkMail, $mail->getMailAdress());
    }
    public function testRequestGetReminderOK()
    {
        try {
            $getGetReminderRequest = $this->getGetReminderRequestModelOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetReminderMethod()
                                        ->withRequest($getGetReminderRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetReminderResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
                $code = $responseObj->getMember()->getReminder()->getCode() ?? null;
                $question1 = $responseObj->getMember()->getReminder()->getQuestion1() ?? null;
                $answer1 = $responseObj->getMember()->getReminder()->getAnswer1() ?? null;
                $question2 = $responseObj->getMember()->getReminder()->getQuestion2() ?? null;
                $answer2 = $responseObj->getMember()->getReminder()->getAnswer2() ?? null;
                $question3 = $responseObj->getMember()->getReminder()->getQuestion3() ?? null;
                $answer3 = $responseObj->getMember()->getReminder()->getAnswer3() ?? null;
                $question4 = $responseObj->getMember()->getReminder()->getQuestion4() ?? null;
                $answer4 = $responseObj->getMember()->getReminder()->getAnswer4() ?? null;
                $question5 = $responseObj->getMember()->getReminder()->getQuestion5() ?? null;
                $answer5 = $responseObj->getMember()->getReminder()->getAnswer5() ?? null;
                $question6 = $responseObj->getMember()->getReminder()->getQuestion6() ?? null;
                $answer6 = $responseObj->getMember()->getReminder()->getAnswer6() ?? null;
                $question7 = $responseObj->getMember()->getReminder()->getQuestion7() ?? null;
                $answer7 = $responseObj->getMember()->getReminder()->getAnswer7() ?? null;

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals('106', $code);
        $this->assertEquals('test_question1', $question1);
        $this->assertEquals('test_answer1', $answer1);
        $this->assertEquals('test_question2', $question2);
        $this->assertEquals('test_answer2', $answer2);
        $this->assertEquals('test_question3', $question3);
        $this->assertEquals('test_answer3', $answer3);
        $this->assertEquals('test_question4', $question4);
        $this->assertEquals('test_answer4', $answer4);
        $this->assertEquals('test_question5', $question5);
        $this->assertEquals('test_answer5', $answer5);
        $this->assertEquals('test_question6', $question6);
        $this->assertEquals('test_answer6', $answer6);
        $this->assertEquals('test_question7', $question7);
        $this->assertEquals('test_answer7', $answer7);
        $this->assertEquals('', $message1);
        $this->assertEquals('', $message2);
    }
    public function getGetReminderRequestModelOK()
    {
        $mail = new GetReminderRequestModel();
        $mail->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress($this->checkMail);
        return $mail;
    }

    public function testRequestGetReminderNG()
    {
        try {
            $getGetReminderRequest = $this->getGetReminderRequestModelNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetReminderMethod()
                                        ->withRequest($getGetReminderRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetReminderResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
                $reminder = $responseObj->getMember()->getReminder() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(null, $reminder);
        $this->assertEquals("WEB顧客情報が存在しません", $message1);
        $this->assertEquals("select mbid code,question1,answer1,question2,answer2,question3,answer3,question4,answer4,question5,answer5,question6,answer6,question7,answer7 from memweb where syid=:xid and email=:xmail", $message2);
    }
    public function getGetReminderRequestModelNG()
    {
        $mail = new GetReminderRequestModel();
        $mail->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress("do-not-exist-this-email@AceClient.v.1.0");;
        return $mail;
    }

    public function testSearializeGetReminder()
    {
        $getReminderRequestModel = $this->getReminderRequestForSerialize();
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
            <getReminder xmlns="{$xmlns}">
                <id>13</id>
                <mailadress>GetReminderTest@AceClient.v.1.0</mailadress>
            </getReminder>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getReminderRequestForSerialize(): GetReminderRequestModel
    {
        $reminder = new GetReminderRequestModel();
        $getReminder = $reminder->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress($this->checkMail);
        return $getReminder;
    }

}