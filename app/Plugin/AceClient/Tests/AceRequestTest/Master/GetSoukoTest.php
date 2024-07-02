<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetSouko\GetSoukoRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetSouko\GetSoukoResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetSoukoRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetSouko()
    {
        $getSoukoRequestModel = $this->GetSoukoRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getSoukoRequestModel);
        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getSouko xmlns="{$xmlns}">
                <id>13</id>
            </getSouko>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetSoukoRequestForSerialize(): GetSoukoRequestModel
    {
        $souko = new GetSoukoRequestModel();
        $getSouko = $souko->setId(OverviewMapper::ACE_TEST_SYID);
        return $getSouko;
    }

    public function GetSoukoRequestOK(): GetSoukoRequestModel
    {
        $souko = new GetSoukoRequestModel();
        $getSouko = $souko->setId(OverviewMapper::ACE_TEST_SYID);
        return $getSouko;
    }
    public function GetSoukoRequestNG(): GetSoukoRequestModel
    {
        $souko = new GetSoukoRequestModel();
        $getSouko = $souko->setId(-1);
        return $getSouko;
    }
    public function testRequestGetSoukoOK()
    {
        try {
            $getSoukoRequest = $this->GetSoukoRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetSoukoMethod()
                                        ->withRequest($getSoukoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetSoukoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $souko1 = $responseObj->getMaster()->getSouko()[0];
                $souko2 = $responseObj->getMaster()->getSouko()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("1", $souko1->getCode());
        $this->assertEquals("EccubePlugin倉庫", $souko1->getName());

        $this->assertEquals("100", $souko2->getCode());
        $this->assertEquals("GetZaikoテスト倉庫", $souko2->getName());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetSoukoNG()
    {
        try {
            $getSoukoRequest = $this->GetSoukoRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetSoukoMethod()
                                        ->withRequest($getSoukoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetSoukoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $souko = $responseObj->getMaster()->getSouko();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $souko);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
