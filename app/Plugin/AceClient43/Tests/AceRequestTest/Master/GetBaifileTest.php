<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBaifile\GetBaifileRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBaifile\GetBaifileResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBaifileRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBaifile()
    {
        $getBaifileRequestModel = $this->GetBaifileRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getBaifileRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBaifile xmlns="{$xmlns}">
                <id>13</id>
                <bcode>101</bcode>
            </getBaifile>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBaifileRequestForSerialize(): GetBaifileRequestModel
    {
        $baifile = new GetBaifileRequestModel();
        $getBaifile = $baifile->setId(OverviewMapper::ACE_TEST_SYID)
                              ->setBcode("101");
        return $getBaifile;
    }

    public function GetBaifileRequestOK(): GetBaifileRequestModel
    {
        $baifile = new GetBaifileRequestModel();
        $getBaifile = $baifile->setId(OverviewMapper::ACE_TEST_SYID)
                              ->setBcode("101");
        return $getBaifile;
    }
    public function GetBaifileRequestNG(): GetBaifileRequestModel
    {
        $baifile = new GetBaifileRequestModel();
        $getBaifile = $baifile->setId(-1)
                              ->setBcode("101");
        return $getBaifile;
    }
    public function testRequestGetBaifileOK()
    {
        try {
            $getBaifileRequest = $this->GetBaifileRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBaifileMethod()
                                        ->withRequest($getBaifileRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBaifileResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $baifile1 = $responseObj->getMaster()->getBaifile()[0];
                $baifile2 = $responseObj->getMaster()->getBaifile()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("101", $baifile1->getBcode());
        $this->assertEquals("1011", $baifile1->getBkcode());
        $this->assertEquals("媒体１０１１", $baifile1->getName());
        $this->assertEquals("媒体１０１１", $baifile1->getSubName());
        $this->assertEquals(0, $baifile1->getKeihi());
        $this->assertEquals("2024-06-02", $baifile1->getSday()->toShortDate());
        $this->assertEquals("2024-06-05", $baifile1->getEday()->toShortDate());
        $this->assertEquals(0, $baifile1->getStopfg());
        $this->assertEquals("", $baifile1->getFcode1());
        $this->assertEquals("", $baifile1->getFcode2());

        $this->assertEquals("101", $baifile2->getBcode());
        $this->assertEquals("1012", $baifile2->getBkcode());
        $this->assertEquals("媒体１０１２", $baifile2->getName());
        $this->assertEquals("媒体１０１２", $baifile2->getSubName());
        $this->assertEquals(0, $baifile2->getKeihi());
        $this->assertEquals("2024-06-06", $baifile2->getSday()->toShortDate());
        $this->assertEquals("2024-06-16", $baifile2->getEday()->toShortDate());
        $this->assertEquals(0, $baifile2->getStopfg());
        $this->assertEquals("", $baifile2->getFcode1());
        $this->assertEquals("", $baifile2->getFcode2());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBaifileNG()
    {
        try {
            $getBaifileRequest = $this->GetBaifileRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBaifileMethod()
                                        ->withRequest($getBaifileRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBaifileResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $baifile = $responseObj->getMaster()->getBaifile();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $baifile);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
