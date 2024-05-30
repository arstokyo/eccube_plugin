<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\GetPassword\GetPasswordRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPassword\GetPasswordResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetPasswordRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetPassword()
    {
        $getPasswordRequestModel = $this->GetPasswordRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getPasswordRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData = <<<XML
                            {$soapHead}
                                <getPassword xmlns="{$xmlns}">
                                    <id>13</id>
                                    <mail>abc@gmail.com</mail>
                                </getPassword>
                            {$soapEnd}
                        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetPasswordRequestForSerialize(): GetPasswordRequestModel
    {
        $password = new GetPasswordRequestModel();
        $getPassword = $password->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setMail("abc@gmail.com");
        return $getPassword;
    }

    public function GetPasswordRequestOK(): GetPasswordRequestModel
    {
        $password = new GetPasswordRequestModel();
        $getPassword = $password->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setMail("GetPasswordTest@AceClient.v1.1");
        return $getPassword;
    }
    public function GetPasswordRequestNG(): GetPasswordRequestModel
    {
        $password = new GetPasswordRequestModel();
        $getPassword = $password->setId(-1)
                                ->setMail("GetPasswordTest@AceClient.v1.1");
        return $getPassword;
    }
    public function testRequestGetPasswordOK()
    {
        try {
            $getPasswordRequest = $this->GetPasswordRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetPasswordMethod()
                                        ->withRequest($getPasswordRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPasswordResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $memweb = $responseObj->getMember()->getMemweb();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("GetPasswordTest@AceClient.v1.1", $memweb->getMail());
        $this->assertEquals("P@ssword1#", $memweb->getPasswd());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetPasswordNG()
    {
        try {
            $getPasswordRequest = $this->GetPasswordRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetPasswordMethod()
                                        ->withRequest($getPasswordRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPasswordResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $memweb = $responseObj->getMember()->getMemweb();
                $message = $responseObj->getMember()->getMessage();

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
