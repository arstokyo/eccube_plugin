<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFreemst\GetMemberFreemstRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFreemst\GetMemberFreemstResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemberFreemstRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemberFreemst()
    {
        $getMemberFreemstRequestModel = $this->GetMemberFreemstRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemberFreemstRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemberFreemst xmlns="{$xmlns}">
                <id>13</id>
            </getMemberFreemst>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemberFreemstRequestForSerialize(): GetMemberFreemstRequestModel
    {
        $freemst = new GetMemberFreemstRequestModel();
        $getMemberFreemst = $freemst->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemberFreemst;
    }

    public function GetMemberFreemstRequestOK(): GetMemberFreemstRequestModel
    {
        $freemst = new GetMemberFreemstRequestModel();
        $getMemberFreemst = $freemst->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemberFreemst;
    }
    public function GetMemberFreemstRequestNG(): GetMemberFreemstRequestModel
    {
        $freemst = new GetMemberFreemstRequestModel();
        $getMemberFreemst = $freemst->setId(-1);
        return $getMemberFreemst;
    }
    public function testRequestGetMemberFreemstOK()
    {
        try {
            $getMemberFreemstRequest = $this->GetMemberFreemstRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreemstMethod()
                                        ->withRequest($getMemberFreemstRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreemstResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freemst1 = $responseObj->getMaster()->getFreemst()[0];
                $freemst2 = $responseObj->getMaster()->getFreemst()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(101100, $freemst1->getKubun());
        $this->assertEquals("フリー100", $freemst1->getName());
        $this->assertEquals(0, $freemst1->getType());
        $this->assertEquals(null, $freemst1->getJyun());
        $this->assertEquals(0, $freemst1->getReqflg());
        $this->assertEquals("", $freemst1->getExplanation());
        $this->assertEquals(null, $freemst1->getOyakubun());
        $this->assertEquals("", $freemst1->getBgcolor());
        $this->assertEquals(0, $freemst1->getRpos());
        $this->assertEquals(0, $freemst1->getLeng());

        $this->assertEquals(101101, $freemst2->getKubun());
        $this->assertEquals("フリー101", $freemst2->getName());
        $this->assertEquals(1, $freemst2->getType());
        $this->assertEquals(null, $freemst2->getJyun());
        $this->assertEquals(0, $freemst2->getReqflg());
        $this->assertEquals("", $freemst2->getExplanation());
        $this->assertEquals(null, $freemst2->getOyakubun());
        $this->assertEquals("", $freemst2->getBgcolor());
        $this->assertEquals(0, $freemst2->getRpos());
        $this->assertEquals(0, $freemst2->getLeng());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemberFreemstNG()
    {
        try {
            $getMemberFreemstRequest = $this->GetMemberFreemstRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreemstMethod()
                                        ->withRequest($getMemberFreemstRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreemstResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freemst = $responseObj->getMaster()->getFreemst();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $freemst);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
