<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Request\Master\GetMemAnk\GetMemAnkRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnk\GetMemAnkResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemAnkRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemAnk()
    {
        $getMemAnkRequestModel = $this->GetMemAnkRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemAnkRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemAnk xmlns="{$xmlns}">
                <id>13</id>
                <mbid>222</mbid>
            </getMemAnk>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemAnkRequestForSerialize(): GetMemAnkRequestModel
    {
        $memank = new GetMemAnkRequestModel();
        $getMemAnk = $memank->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setMbid("222");
        return $getMemAnk;
    }

    public function GetMemAnkRequestOK(): GetMemAnkRequestModel
    {
        $memank = new GetMemAnkRequestModel();
        $getMemAnk = $memank->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setMbid("212");
        return $getMemAnk;
    }
    public function GetMemAnkRequestNG(): GetMemAnkRequestModel
    {
        $memank = new GetMemAnkRequestModel();
        $getMemAnk = $memank->setId(-1)
                            ->setMbid("212");
        return $getMemAnk;
    }
    public function testRequestGetMemAnkOK()
    {
        try {
            $getMemAnkRequest = $this->GetMemAnkRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemAnkMethod()
                                        ->withRequest($getMemAnkRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemAnkResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $memank1 = $responseObj->getMaster()->getMemAnk()[0];
                $memank2 = $responseObj->getMaster()->getMemAnk()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("212", $memank1->getMbid());
        $this->assertEquals(105001, $memank1->getKubun());
        $this->assertEquals(1, $memank1->getAnsno());
        $this->assertEquals("2", $memank1->getAnsid());

        $this->assertEquals("212", $memank2->getMbid());
        $this->assertEquals(105002, $memank2->getKubun());
        $this->assertEquals(1, $memank2->getAnsno());
        $this->assertEquals("3", $memank2->getAnsid());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemAnkNG()
    {
        try {
            $getMemAnkRequest = $this->GetMemAnkRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemAnkMethod()
                                        ->withRequest($getMemAnkRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemAnkResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $memank = $responseObj->getMaster()->getMemAnk();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $memank);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
