<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Contact;

use Plugin\AceClient\AceServices\Model\Request\Contact\RegContact\RegContactRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Contact\RegContact\InquiryPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Contact\RegContact;
use Plugin\AceClient\AceServices\Model\Response\Contact\RegContact\RegContactResponseModel;;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class RegMemberAdrTest extends AceRequestTestAbtract
{
    private ?string $fdate;
    private ?string $condate;
    private ?string $athomedate;
    private ?string $cfreeday1;

    public function getRegContactModel(): RegContactRequestModel
    {
        $this->fdate = (new \Datetime())->modify('+1 year')->format('Y/m/d H:i:s');
        $this->cfreeday1 = (new \Datetime())->modify('+1 year')->format('Y/m/d H:i:s');
        $this->condate = (new \Datetime())->modify('+2 year')->format('Y/m/d H:i:s');
        $this->athomedate = (new \Datetime())->modify('+3 year')->format('Y/m/d H:i:s');

        $inquiryPrm = new InquiryPrmModel();
        $inquiryPrm->setContact((new RegContact\ContactModel())
                                    ->setFdate($this->fdate)
                                    ->setStatus(1)
                                    ->setKind(2)
                                    ->setMsyid(0)
                                    ->setEtcid("abc")
                                    ->setDenno(79)
                                    ->setNouno(21)
                                    ->setEdano("1212")
                                    ->setGdid("4334")
                                    ->setGhid("4334")
                                    ->setLastgroup("123")
                                    ->setCuser("323")
                                    ->setUuser("abc")
                                    ->setCfreemst1("abc")
                                    ->setCfreememo1("test")
                                    ->setCfreeday1($this->cfreeday1)
                                    ->setCfreedata1("test1")
                                )
                    ->setContactmei((new RegContact\ContactmeiModel())
                                    ->setEdano(1)
                                    ->setCondate($this->condate)
                                    ->setStatus(2)
                                    ->setRequestgroup("test_group")
                                    ->setRequestuser("test_user")
                                    ->setCuser("cuser_test")
                                    ->setUuser("uuser_test")
                                    ->setAthomedate($this->athomedate)
                                    ->setAthometime("120040")
                                    ->setNote1("note_contactmei1")
                                    ->setNote2("note_contactmei2")
                                );
        return (new RegContactRequestModel())->setId(OverviewMapper::ACE_TEST_SYID)->setPrm($inquiryPrm);
    }

    public function testSerializeRegContact()
    {
        $requestModel = $this->getRegContactModel();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($requestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;

        $expectedData =
        <<<XML
        {$soapHead}
            <regContact xmlns="{$xmlns}">
                <prm><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
                    <inquiry>
                        <contact>
                            <fdate>$this->fdate</fdate>
                            <kind>2</kind>
                            <msyid>0</msyid>
                            <etcid>abc</etcid>
                            <nouno>21</nouno>
                            <ghid>4334</ghid>
                            <lastgroup>123</lastgroup>
                            <cfreemst1>abc</cfreemst1>
                            <cfreememo1>test</cfreememo1>
                            <cfreeday1>$this->cfreeday1</cfreeday1>
                            <cfreedata1>test1</cfreedata1>
                            <denno>79</denno>
                            <gdid>4334</gdid>
                            <edano>1212</edano>
                            <status>1</status>
                            <cuser>323</cuser>
                            <uuser>abc</uuser>
                        </contact>
                        <contactmei>
                            <condate>$this->condate</condate>
                            <requestgroup>test_group</requestgroup>
                            <requestuser>test_user</requestuser>
                            <athomedate>$this->athomedate</athomedate>
                            <athometime>120040</athometime>
                            <note1>note_contactmei1</note1>
                            <note2>note_contactmei2</note2>
                            <edano>1</edano>
                            <status>2</status>
                            <cuser>cuser_test</cuser>
                            <uuser>uuser_test</uuser>
                        </contactmei>
                    </inquiry>
                    ]]></prm>
                <id>13</id>
                <sessId/>
            </regContact>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function testRequestRegContactOK()
    {
        try {
            $regContactRequest = $this->getRegContactModel();
            $response = $this->aceClient->makeContactService()
                                        ->makeRegContactMethod()
                                        ->withRequest($regContactRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegContactResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getInquiry()->getMessage()->getMessage1();
                $contact = $responseObj->getInquiry()->getContact();
                $contactmei = $responseObj->getInquiry()->getContactmei();
                $message = $responseObj->getInquiry()->getMessage();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertIsInt($contact->getConid());
        $this->assertEquals(1, $contact->getStatus());
        $this->assertEquals(2, $contact->getKind());
        $this->assertEquals(0, $contact->getMsyid());
        $this->assertEquals("abc", $contact->getEtcid());
        $this->assertEquals(21, $contact->getNouno());
        $this->assertEquals("1212", $contact->getEdano());
        $this->assertEquals("4334", $contact->getGhid());
        $this->assertEquals("123", $contact->getLastgroup());
        $this->assertEquals("323", $contact->getCuser());
        $this->assertEquals("abc", $contact->getUuser());
        $this->assertEquals("abc", $contact->getCfreemst1());
        $this->assertEquals("test", $contact->getCfreememo1());
        $this->assertEquals("test1", $contact->getCfreedata1());
        $this->assertEquals(79, $contact->getDenno());
        $this->assertEquals("4334", $contact->getGdid());
        $this->assertEquals($this->fdate, $contact->getFdate()->toApiDateTime());
        $this->assertEquals($this->cfreeday1, $contact->getCfreeday1()->toApiDateTime());

        $this->assertEquals(1, $contactmei->getEdano());
        $this->assertEquals(2, $contactmei->getStatus());
        $this->assertEquals("test_group", $contactmei->getRequestgroup());
        $this->assertEquals("test_user", $contactmei->getRequestuser());
        $this->assertEquals("cuser_test", $contactmei->getCuser());
        $this->assertEquals("uuser_test", $contactmei->getUuser());
        $this->assertEquals("120040", $contactmei->getAthometime());
        $this->assertEquals("note_contactmei1", $contactmei->getNote1());
        $this->assertEquals("note_contactmei2", $contactmei->getNote2());
        $this->assertEquals($this->condate, $contactmei->getCondate()->toApiDateTime());
        $this->assertEquals($this->athomedate, $contactmei->getAthomedate()->toApiDateTime());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestRegContactNG()
    {
        try {
            $regContactRequest = $this->getRegContactModel()->setId(-1);
            $response = $this->aceClient->makeContactService()
                                        ->makeRegContactMethod()
                                        ->withRequest($regContactRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegContactResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getInquiry()->getMessage()->getMessage1();
                $contact = $responseObj->getInquiry()->getContact();
                $contactmei = $responseObj->getInquiry()->getContactmei();
                $message = $responseObj->getInquiry()->getMessage();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $contact);
        $this->assertEquals(null, $contactmei);

        $this->assertEquals("システムＩＤ設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}