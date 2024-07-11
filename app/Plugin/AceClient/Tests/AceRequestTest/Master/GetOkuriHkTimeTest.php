<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\AceServices\Model\Request\Master\GetOkuriHkTime\GetOkuriHkTimeRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime\GetOkuriHkTimeResponseModel;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

/**
 * Test serialize getOkuriHkTime 
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */


class GetOkuriHkTimeRequestTest extends AceRequestTestAbtract
{
    public function testSearializeGetOkuriHkTime()
    {
        $getOkuriHkTimeRequestModel = $this->getOkuriHkTimeRequestForSerialize();
        
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getOkuriHkTimeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns()?
                 $serializer->getConfig()->getXmlns()['@xmlns'] : 
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;

        $expectedData = 
        <<<XML
        {$soapHead}
            <getOkuriHkTime xmlns="{$xmlns}">
            <id>13</id>
            </getOkuriHkTime>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData)); 
    }

    public function getOkuriHkTimeRequestForSerialize():GetOkuriHkTimeRequestModel
    {
        return (new GetOkuriHkTimeRequestModel())->setId(OverviewMapper::ACE_TEST_SYID);
    }

    public function getOkuriHkTimeRequestOK(): GetOkuriHkTimeRequestModel
    {
        $okuri = new GetOkuriHkTimeRequestModel();
        $getOkuri = $okuri->setId(OverviewMapper::ACE_TEST_SYID);
        return $getOkuri;
    } 

    public function getOkuriHkTimeRequestNG(): GetOkuriHkTimeRequestModel
    {
        $okuri = new GetOkuriHkTimeRequestModel();
        $getOkuri = $okuri->setId(-1);
        return $getOkuri;
    }

    public function testRequestGetIkuriHkTimeOK()
    {
        try {
            $getOkurisRequest = $this->getOkuriHkTimeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetOkuriHkTimeMethod()
                                        ->withRequest($getOkurisRequest)
                                        ->send();
            if ($response->getStatusCode() == 200) {
                /** @var GetOkuriHkTimeResponseModel $responseObj */ 
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $okuri1 = $responseObj->getMaster()->getOkuri()[0];
                $okuri2 = $responseObj->getMaster()->getOkuri()[1];
                $okuri3 = $responseObj->getMaster()->getOkuri()[2];
                $message = $responseObj->getMaster()->getMessage();
            }
        } catch (ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch (\Throwable $e) {
            $message1 = $e->getMessage() ??'One Error Occurred when sending request.';
        }

        $this->assertEquals('10', $okuri1->getOcode());
        $this->assertEquals("ヤマト運輸", $okuri1->getOname());
        $this->assertEquals("ヤマト", $okuri1->getOsubname());
        $this->assertEquals('0', $okuri1->getDenkuNum());
        $this->assertEquals('10', $okuri1->getHcode());
        $this->assertEquals("ヤマト", $okuri1->getHname());
        $this->assertEquals('0', $okuri1->getJyouon());
        $this->assertEquals('1', $okuri1->getReizou());
        $this->assertEquals('1', $okuri1->getReitou());
        $this->assertEquals('1', $okuri1->getHkCode());
        $this->assertEquals("指定なし", $okuri1->getHkName());

        $this->assertEquals('10', $okuri2->getOcode());
        $this->assertEquals("ヤマト運輸", $okuri2->getOname());
        $this->assertEquals("ヤマト", $okuri2->getOsubname());
        $this->assertEquals('0', $okuri2->getDenkuNum());
        $this->assertEquals('10', $okuri2->getHcode());
        $this->assertEquals("ヤマト", $okuri2->getHname());
        $this->assertEquals('0', $okuri2->getJyouon());
        $this->assertEquals('1', $okuri2->getReizou());
        $this->assertEquals('1', $okuri2->getReitou());
        $this->assertEquals('2', $okuri2->getHkCode());
        $this->assertEquals("午前中", $okuri2->getHkName());

        $this->assertEquals('10', $okuri3->getOcode());
        $this->assertEquals("ヤマト運輸", $okuri3->getOname());
        $this->assertEquals("ヤマト", $okuri3->getOsubname());
        $this->assertEquals('0', $okuri3->getDenkuNum());
        $this->assertEquals('10', $okuri3->getHcode());
        $this->assertEquals("ヤマト", $okuri3->getHname());
        $this->assertEquals('0', $okuri3->getJyouon());
        $this->assertEquals('1', $okuri3->getReizou());
        $this->assertEquals('1', $okuri3->getReitou());
        $this->assertEquals('3', $okuri3->getHkCode());
        $this->assertEquals("14:00~16:00", $okuri3->getHkName());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
        
    }

    public function testRequestGetIkuriHkTimeNG()
    {
        try {
            $getOkurisRequest = $this->getOkuriHkTimeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetOkuriHkTimeMethod()
                                        ->withRequest($getOkurisRequest)
                                        ->send();
            if ($response->getStatusCode() == 200) {
                /** @var GetOkuriHkTimeResponseModel $responseObj */ 
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $okuri = $responseObj->getMaster()->getOkuri();
                $message = $responseObj->getMaster()->getMessage();
            }
        } catch (ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch (\Throwable $e) {
            $message1 = $e->getMessage() ??'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $okuri);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message1);
        $this->assertEquals("", $message->getMessage2());
    }

}