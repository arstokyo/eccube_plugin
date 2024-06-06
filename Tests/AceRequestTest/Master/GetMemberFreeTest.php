<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFree\GetMemberFreeRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFree\GetMemberFreeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemberFreeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemberFree()
    {
        $getMemberFreeRequestModel = $this->GetMemberFreeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemberFreeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemberFree xmlns="{$xmlns}">
                <mbid>212</mbid>
                <id>13</id>
            </getMemberFree>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemberFreeRequestForSerialize(): GetMemberFreeRequestModel
    {
        $memberfree = new GetMemberFreeRequestModel();
        $getMemberFree = $memberfree->setId(OverviewMapper::ACE_TEST_SYID)
                                    ->setMbid("212");
        return $getMemberFree;
    }

    public function GetMemberFreeRequestOK(): GetMemberFreeRequestModel
    {
        $memberfree = new GetMemberFreeRequestModel();
        $getMemberFree = $memberfree->setId(OverviewMapper::ACE_TEST_SYID)
                                    ->setMbid("212");
        return $getMemberFree;
    }
    public function GetMemberFreeRequestNG(): GetMemberFreeRequestModel
    {
        $memberfree = new GetMemberFreeRequestModel();
        $getMemberFree = $memberfree->setId(-1)
                                    ->setMbid("212");
        return $getMemberFree;
    }
    public function testRequestGetMemberFreeOK()
    {
        try {
            $getMemberFreeRequest = $this->GetMemberFreeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreeMethod()
                                        ->withRequest($getMemberFreeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $memberfree1 = $responseObj->getMaster()->getMemberFree()[0];
                $memberfree2 = $responseObj->getMaster()->getMemberFree()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("212", $memberfree1->getMbid());
        $this->assertEquals(101100, $memberfree1->getKubun());
        $this->assertEquals("1001", $memberfree1->getFree());

        $this->assertEquals("212", $memberfree2->getMbid());
        $this->assertEquals(101101, $memberfree2->getKubun());
        $this->assertEquals("1011", $memberfree2->getFree());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemberFreeNG()
    {
        try {
            $getMemberFreeRequest = $this->GetMemberFreeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemberFreeMethod()
                                        ->withRequest($getMemberFreeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemberFreeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $memberfree = $responseObj->getMaster()->getMemberFree();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $memberfree);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
