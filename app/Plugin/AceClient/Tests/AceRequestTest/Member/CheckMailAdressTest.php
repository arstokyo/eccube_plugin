<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\CheckMailAdress\CheckMailAdressRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;

class CheckMailAdressRequestModelTest extends AbstractAdminWebTestCase
{
    public function testCalCheckMailAdressRequestModel()
    {
        $mail = new CheckMailAdressRequestModel();
        $mail->setId(0)->setMailAdress("1234");
        $this->assertEquals(0, $mail->getId());
        $this->assertEquals(1234, $mail->getMailAdress());
    }
    public function testRequestCheckMailAdressOK()
    {
        try {
            $getCheckMailAdressRequest = $this->getCheckMailAdressRequestModelOK();
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
        $this->assertEquals('abc', $mailAdress);
        $this->assertEquals('OK', $result);
        $this->assertEquals('', $message1);
        $this->assertEquals('', $message2);
    }
    public function getCheckMailAdressRequestModelOK()
    {
        $mail = new CheckMailAdressRequestModel();
        $mail->setId(7)->setMailAdress('abc');
        return $mail;
    }
}