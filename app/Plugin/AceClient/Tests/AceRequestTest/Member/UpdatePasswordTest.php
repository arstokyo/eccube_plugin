<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\UpdatePassword\UpdatePasswordRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword\UpdatePasswordResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class UpdatePasswordRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeUpdatePassword()
    {
        $UpdatePasswordRequestModel = $this->UpdatePasswordRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($UpdatePasswordRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <updatePassword xmlns="{$xmlns}">
                <password>111</password>
                <syid>13</syid>
                <mbid>204</mbid>
            </updatePassword>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function UpdatePasswordRequestForSerialize(): UpdatePasswordRequestModel
    {
        $mailMagazine = new UpdatePasswordRequestModel();
        $UpdatePassword = $mailMagazine->setSyid(OverviewMapper::ACE_TEST_SYID)
                                       ->setMbid("204")
                                       ->setPasswd(111);
        return $UpdatePassword;
    }

    public function UpdatePasswordRequestOK(): UpdatePasswordRequestModel
    {
        $password = new UpdatePasswordRequestModel();
        $UpdatePassword = $password->setSyid(OverviewMapper::ACE_TEST_SYID)
                                   ->setMbid("204")
                                   ->setPasswd(999998888);
        return $UpdatePassword;
    }
    public function UpdatePasswordRequestNG(): UpdatePasswordRequestModel
    {
        $password = new UpdatePasswordRequestModel();
        $UpdatePassword = $password->setSyid(-1)
                                   ->setMbid("204")
                                   ->setPasswd(999998888);
        return $UpdatePassword;
    }
    public function testRequestUpdatePasswordOK()
    {
        try {
            $updatePasswordRequest = $this->UpdatePasswordRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeUpdatePasswordMethod()
                                        ->withRequest($updatePasswordRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var UpdatePasswordResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $message = $responseObj->getMember()->getMessage();
                $memweb = $responseObj->getMember()->getMemweb();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("204", $memweb->getMbid());
        $this->assertEquals("999998888", $memweb->getPasswd());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestUpdatePasswordNG()
    {
        try {
            $updatePasswordRequest = $this->UpdatePasswordRequestNG();
            $response = $this->aceClient->makeMemberService()
                                       ->makeUpdatePasswordMethod()
                                       ->withRequest($updatePasswordRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var UpdatePasswordResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $message = $responseObj->getMember()->getMessage();
                $memweb = $responseObj->getMember()->getMemweb();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $memweb);
        $this->assertEquals(null, $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
