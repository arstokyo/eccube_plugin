<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\CheckMailAdress\CheckMailAdressRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;

class CheckMailAdressRequestModelTest extends AbstractAdminWebTestCase
{
    private ?string $checkMail = 'CheckMailAdressTest@AceClient.v.1.0';
    public function testCalCheckMailAdressRequestModel()
    {
        $mail = new CheckMailAdressRequestModel();
        $mail->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress($this->checkMail);
        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $mail->getId());
        $this->assertEquals($this->checkMail, $mail->getMailAdress());
    }
    public function testRequestCheckMailAdressCase1()
    {
        try {
            $getCheckMailAdressRequest = $this->getCheckMailAdressRequestModelCase1();
            $response = (new AceClient)->makeMemberService()
                                       ->makeCheckMailAdressMethod()
                                       ->withRequest($getCheckMailAdressRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var CheckMailAdressResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $mailAdress = $responseObj->getMember()
                                        ->getMessage()
                                        ->getAdress();
                $result = $responseObj->getMember()
                                        ->getMessage()
                                        ->getResult();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals($this->checkMail, $mailAdress);
        $this->assertEquals('NG', $result);
        $this->assertEquals('メールアドレスの登録がありますのでお問合せか、お電話にてご連絡ください。', $message1);
        $this->assertEquals('select mw.mbid from memweb mw inner join member mb on mb.syid=mw.syid and mb.mbid=mw.mbid and mb.delfg=0 where mw.syid=:xid and (mw.userid=:xmail or mw.email=:xmail) and status=0', $message2);
    }
    public function getCheckMailAdressRequestModelCase1()
    {
        $mail = new CheckMailAdressRequestModel();
        $mail->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress($this->checkMail);
        return $mail;
    }

    public function testRequestCheckMailAdressCase2()
    {
        try {
            $getCheckMailAdressRequest = $this->getCheckMailAdressRequestModelCase2();
            $response = (new AceClient)->makeMemberService()
                                       ->makeCheckMailAdressMethod()
                                       ->withRequest($getCheckMailAdressRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var CheckMailAdressResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $mailAdress = $responseObj->getMember()
                                        ->getMessage()
                                        ->getAdress();
                $result = $responseObj->getMember()
                                        ->getMessage()
                                        ->getResult();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals('do-not-exist-this-email@AceClient.v.1.0', $mailAdress);
        $this->assertEquals('OK', $result);
        $this->assertEquals('', $message1);
        $this->assertEquals('', $message2);
    }

    public function getCheckMailAdressRequestModelCase2()
    {
        $mail = new CheckMailAdressRequestModel();
        $mail->setId(OverviewMapper::ACE_TEST_SYID)->setMailAdress('do-not-exist-this-email@AceClient.v.1.0');
        return $mail;
    }
}