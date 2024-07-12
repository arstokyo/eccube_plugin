<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetGoodsFree\GetGoodsFreeRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFree\GetGoodsFreeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetGoodsFreeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetGoodsFree()
    {
        $getGoodsFreeRequestModel = $this->GetGoodsFreeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getGoodsFreeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getGoodsFree xmlns="{$xmlns}">
                <id>13</id>
                <execDateFrom>2024/06/03 00:00:05</execDateFrom>
                <execDateTo>2024/06/05 01:00:00</execDateTo>
            </getGoodsFree>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetGoodsFreeRequestForSerialize(): GetGoodsFreeRequestModel
    {
        $goodfree = new GetGoodsFreeRequestModel();
        $getGoodsFree = $goodfree->setId(OverviewMapper::ACE_TEST_SYID)
                               ->setExecDateFrom("2024/06/03 00:00:05")
                               ->setExecDateTo("2024/06/05 01:00:00");
        return $getGoodsFree;
    }

    public function GetGoodsFreeRequestOK(): GetGoodsFreeRequestModel
    {
        $goodfree = new GetGoodsFreeRequestModel();
        $getGoodsFree = $goodfree->setId(OverviewMapper::ACE_TEST_SYID);
        return $getGoodsFree;
    }
    public function GetGoodsFreeRequestNG(): GetGoodsFreeRequestModel
    {
        $goodfree = new GetGoodsFreeRequestModel();
        $getGoodsFree = $goodfree->setId(-1);
        return $getGoodsFree;
    }
    public function testRequestGetGoodsFreeOK()
    {
        try {
            $getGoodsFreeRequest = $this->GetGoodsFreeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetGoodsFreeMethod()
                                        ->withRequest($getGoodsFreeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsFreeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goodsfree1 = $responseObj->getMaster()->getGoodsFree()[0];
                $goodsfree2 = $responseObj->getMaster()->getGoodsFree()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(2, $goodsfree1->getFrkbn());
        $this->assertEquals("100", $goodsfree1->getFrkey());
        $this->assertEquals(202010, $goodsfree1->getFmkbn());
        $this->assertEquals("C:\Users\\v.t.nguyen\Downloads\image1.jpeg", $goodsfree1->getFree());

        $this->assertEquals(2, $goodsfree2->getFrkbn());
        $this->assertEquals("100", $goodsfree2->getFrkey());
        $this->assertEquals(202011, $goodsfree2->getFmkbn());
        $this->assertEquals("C:\Users\\v.t.nguyen\Downloads\image2.jpeg", $goodsfree2->getFree());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetGoodsFreeNG()
    {
        try {
            $getGoodsFreeRequest = $this->GetGoodsFreeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetGoodsFreeMethod()
                                        ->withRequest($getGoodsFreeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetGoodsFreeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $goodsfree = $responseObj->getMaster()->getGoodsFree();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $goodsfree);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
