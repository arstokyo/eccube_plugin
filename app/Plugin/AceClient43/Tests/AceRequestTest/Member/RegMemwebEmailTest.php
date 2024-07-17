<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemwebEmail\RegMemwebEmailRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemwebEmail\RegMemwebEmailResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class RegMemwebEmailRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeRegMemwebEmail()
    {
        $RegMemwebEmailRequestModel = $this->RegMemwebEmailRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($RegMemwebEmailRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <regMemwebEmail xmlns="{$xmlns}">
                <email>test@gmail.com</email>
                <syid>13</syid>
                <mbid>208</mbid>
            </regMemwebEmail>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function RegMemwebEmailRequestForSerialize(): RegMemwebEmailRequestModel
    {
        $memwebEmail = new RegMemwebEmailRequestModel();
        $RegMemwebEmail = $memwebEmail->setSyid(OverviewMapper::ACE_TEST_SYID)
                                      ->setMbid("208")
                                      ->setMail("test@gmail.com");
        return $RegMemwebEmail;
    }

    public function RegMemwebEmailRequestOK(): RegMemwebEmailRequestModel
    {
        $memwebEmail = new RegMemwebEmailRequestModel();
        $RegMemwebEmail = $memwebEmail->setSyid(OverviewMapper::ACE_TEST_SYID)
                                      ->setMbid("208")
                                      ->setMail("RegMemwebEmailTest@AceClient.v1.1");
        return $RegMemwebEmail;
    }
    public function RegMemwebEmailRequestNG(): RegMemwebEmailRequestModel
    {
        $memwebEmail = new RegMemwebEmailRequestModel();
        $RegMemwebEmail = $memwebEmail->setSyid(-1)
                                      ->setMbid("208")
                                      ->setMail("RegMemwebEmailTest@AceClient.v1.1");
        return $RegMemwebEmail;
    }
    public function testRequestRegMemwebEmailOK()
    {
        try {
            $regMemwebEmailRequest = $this->RegMemwebEmailRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeRegMemwebEmailMethod()
                                        ->withRequest($regMemwebEmailRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemwebEmailResponseModel $responseObj */
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
        if(null === $memweb)
        {
            $this->assertEquals("このメールアドレスは使用中になります。\n他のアドレスを登録してください。",$message->getMessage1());
            $this->assertEquals("select mw.mbid from memweb mw inner join member mb on mb.syid=mw.syid and mb.mbid=mw.mbid and mb.delfg=0 where mw.syid=:xid and (mw.userid=:xmail or mw.email=:xmail) and status=0", $message->getMessage2());
        }
        else
        {
            $this->assertEquals("208", $memweb->getMbid());
            $this->assertEquals("RegMemwebEmailTest@AceClient.v1.1", $memweb->getMail());
            $this->assertEquals("", $message->getMessage1());
            $this->assertEquals("", $message->getMessage2());
        }
    }

    public function testRequestRegMemwebEmailNG()
    {
        try {
            $regMemwebEmailRequest = $this->RegMemwebEmailRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeRegMemwebEmailMethod()
                                        ->withRequest($regMemwebEmailRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemwebEmailResponseModel $responseObj */
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
