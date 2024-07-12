<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetOkuri\GetOkuriRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuri\GetOkuriResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetOkuriRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetOkuri()
    {
        $getOkuriRequestModel = $this->GetOkuriRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getOkuriRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getOkuri xmlns="{$xmlns}">
                <id>13</id>
            </getOkuri>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetOkuriRequestForSerialize(): GetOkuriRequestModel
    {
        $okuri = new GetOkuriRequestModel();
        $getOkuri = $okuri->setId(OverviewMapper::ACE_TEST_SYID);
        return $getOkuri;
    }

    public function GetOkuriRequestOK(): GetOkuriRequestModel
    {
        $okuri = new GetOkuriRequestModel();
        $getOkuri = $okuri->setId(OverviewMapper::ACE_TEST_SYID);
        return $getOkuri;
    }
    public function GetOkuriRequestNG(): GetOkuriRequestModel
    {
        $okuri = new GetOkuriRequestModel();
        $getOkuri = $okuri->setId(-1);
        return $getOkuri;
    }
    public function testRequestGetOkuriOK()
    {
        try {
            $getOkuriRequest = $this->GetOkuriRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetOkuriMethod()
                                        ->withRequest($getOkuriRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetOkuriResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $okuri1 = $responseObj->getMaster()->getOkuri()[0];
                $okuri2 = $responseObj->getMaster()->getOkuri()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("90", $okuri1->getOcode());
        $this->assertEquals("getHaisoDayTest", $okuri1->getOname());
        $this->assertEquals(0, $okuri1->getKubun());
        $this->assertEquals(0, $okuri1->getHcode());
        $this->assertEquals("なし", $okuri1->getHname());
        $this->assertEquals(0, $okuri1->getJyouon());
        $this->assertEquals(1, $okuri1->getReizou());
        $this->assertEquals(1, $okuri1->getReitou());

        $this->assertEquals("10", $okuri2->getOcode());
        $this->assertEquals("ヤマト運輸", $okuri2->getOname());
        $this->assertEquals(0, $okuri2->getKubun());
        $this->assertEquals(10, $okuri2->getHcode());
        $this->assertEquals("ヤマト", $okuri2->getHname());
        $this->assertEquals(0, $okuri2->getJyouon());
        $this->assertEquals(1, $okuri2->getReizou());
        $this->assertEquals(1, $okuri2->getReitou());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetOkuriNG()
    {
        try {
            $getOkuriRequest = $this->GetOkuriRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetOkuriMethod()
                                        ->withRequest($getOkuriRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetOkuriResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $okuri = $responseObj->getMaster()->getOkuri();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $okuri);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
