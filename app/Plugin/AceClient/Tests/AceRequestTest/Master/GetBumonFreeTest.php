<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBumonFree\GetBumonFreeRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFree\GetBumonFreeResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBumonFreeRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBumonFree()
    {
        $GetBumonFreeRequestModel = $this->GetBumonFreeRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($GetBumonFreeRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBumonFree xmlns="{$xmlns}">
                <id>13</id>
                <execDateFrom>2024/06/03 00:00:05</execDateFrom>
                <execDateTo>2024/06/05 01:00:00</execDateTo>
            </getBumonFree>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBumonFreeRequestForSerialize(): GetBumonFreeRequestModel
    {
        $bumonfree = new GetBumonFreeRequestModel();
        $getBumonFree = $bumonfree->setId(OverviewMapper::ACE_TEST_SYID)
                                  ->setExecDateFrom("2024-06-03 00:00:05")
                                  ->setExecDateTo("2024-06-05 01:00:00");
        return $getBumonFree;
    }

    public function GetBumonFreeRequestOK(): GetBumonFreeRequestModel
    {
        $bumonfree = new GetBumonFreeRequestModel();
        $getBumonFree = $bumonfree->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFree;
    }
    public function GetBumonFreeRequestNG(): GetBumonFreeRequestModel
    {
        $bumonfree = new GetBumonFreeRequestModel();
        $getBumonFree = $bumonfree->setId(-1);
        return $getBumonFree;
    }
    public function testRequestGetBumonFreeOK()
    {
        try {
            $getBumonFreeRequest = $this->GetBumonFreeRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreeMethod()
                                        ->withRequest($getBumonFreeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $bumonfree1 = $responseObj->getMaster()->getBumonFree()[0];
                $bumonfree2 = $responseObj->getMaster()->getBumonFree()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(11, $bumonfree1->getFrkbn());
        $this->assertEquals("301", $bumonfree1->getFrkey());
        $this->assertEquals(211100, $bumonfree1->getFmkbn());
        $this->assertEquals("フリー１", $bumonfree1->getFree());

        $this->assertEquals(11, $bumonfree2->getFrkbn());
        $this->assertEquals("301", $bumonfree2->getFrkey());
        $this->assertEquals(411101, $bumonfree2->getFmkbn());
        $this->assertEquals("3011", $bumonfree2->getFree());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBumonFreeNG()
    {
        try {
            $getBumonFreeRequest = $this->GetBumonFreeRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreeMethod()
                                        ->withRequest($getBumonFreeRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreeResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $bumonfree = $responseObj->getMaster()->getBumonFree();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $bumonfree);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
