<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\RegMailMagazine\RegMailMagazineRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMailMagazine\RegMailMagazineResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class RegMailMagazineRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeRegMailMagazine()
    {
        $regMailMagazineRequestModel = $this->RegMailMagazineRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($regMailMagazineRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData = <<<XML
                            {$soapHead}
                                <regMailMagazine xmlns="{$xmlns}">
                                    <id>13</id>
                                    <mail>abc@gmail.com</mail>
                                    <kbn>0</kbn>
                                </regMailMagazine>
                            {$soapEnd}
                        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function RegMailMagazineRequestForSerialize(): RegMailMagazineRequestModel
    {
        $mailMagazine = new RegMailMagazineRequestModel();
        $RegMailMagazine = $mailMagazine->setId(OverviewMapper::ACE_TEST_SYID)
                                        ->setMail("abc@gmail.com")
                                        ->setKbn(0);
        return $RegMailMagazine;
    }

    public function RegMailMagazineRequestOK(): RegMailMagazineRequestModel
    {
        $mailMagazine = new RegMailMagazineRequestModel();
        $RegMailMagazine = $mailMagazine->setId(OverviewMapper::ACE_TEST_SYID)
                                        ->setMail("testRegMailMagazine@gmail.com")
                                        ->setKbn(0);
        return $RegMailMagazine;
    }
    public function RegMailMagazineRequestNG(): RegMailMagazineRequestModel
    {
        $mailMagazine = new RegMailMagazineRequestModel();
        $RegMailMagazine = $mailMagazine->setId(-1)
                                        ->setMail("testRegMailMagazine@gmail.com")
                                        ->setKbn(0);
        return $RegMailMagazine;
    }
    public function testRequestRegMailMagazineOK()
    {
        try {
            $regMailMagazineRequest = $this->RegMailMagazineRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeRegMailMagazineMethod()
                                        ->withRequest($regMailMagazineRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMailMagazineResponseModel $responseObj */
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
        $this->assertEquals("メルマガ登録しました", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestRegMailMagazineNG()
    {
        try {
            $regMailMagazineRequest = $this->RegMailMagazineRequestNG();
            $response = $this->aceClient->makeMemberService()
                                       ->makeRegMailMagazineMethod()
                                       ->withRequest($regMailMagazineRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMailMagazineResponseModel $responseObj */
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
        $this->assertEquals(null, $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
