<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFreeMemo\GetMemberFreeMemoRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFreeMemo\GetMemberFreeMemoResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemberFreeMemoRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemberFreeMemo()
    {
        $getMemberFreeMemoRequestModel = $this->GetMemberFreeMemoRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemberFreeMemoRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemberFreeMemo xmlns="{$xmlns}">
                <id>13</id>
            </getMemberFreeMemo>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemberFreeMemoRequestForSerialize(): GetMemberFreeMemoRequestModel
    {
        $freememo = new GetMemberFreeMemoRequestModel();
        $getMemberFreeMemo = $freememo->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemberFreeMemo;
    }

    public function GetMemberFreeMemoRequestOK(): GetMemberFreeMemoRequestModel
    {
        $freememo = new GetMemberFreeMemoRequestModel();
        $getMemberFreeMemo = $freememo->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemberFreeMemo;
    }
    public function GetMemberFreeMemoRequestNG(): GetMemberFreeMemoRequestModel
    {
        $freememo = new GetMemberFreeMemoRequestModel();
        $getMemberFreeMemo = $freememo->setId(-1);
        return $getMemberFreeMemo;
    }
    public function testRequestGetMemberFreeMemoOK()
    {
        try {
            $getMemberFreeMemoRequest = $this->GetMemberFreeMemoRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreeMemoMethod()
                                        ->withRequest($getMemberFreeMemoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreeMemoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freememo1 = $responseObj->getMaster()->getFreeMemo()[0];
                $freememo2 = $responseObj->getMaster()->getFreeMemo()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(201103, $freememo1->getKubun());
        $this->assertEquals("1031", $freememo1->getFoid());
        $this->assertEquals("フリーメモー1031", $freememo1->getMemo());

        $this->assertEquals(201104, $freememo2->getKubun());
        $this->assertEquals("1041", $freememo2->getFoid());
        $this->assertEquals("フリーメモー1041", $freememo2->getMemo());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemberFreeMemoNG()
    {
        try {
            $getMemberFreeMemoRequest = $this->GetMemberFreeMemoRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreeMemoMethod()
                                        ->withRequest($getMemberFreeMemoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreeMemoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freememo = $responseObj->getMaster()->getFreeMemo();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $freememo);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
