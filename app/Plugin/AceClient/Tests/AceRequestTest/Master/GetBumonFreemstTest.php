<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBumonFreemst\GetBumonFreemstRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreemst\GetBumonFreemstResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBumonFreemstRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBumonFreemst()
    {
        $getBumonFreemstRequestModel = $this->GetBumonFreemstRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getBumonFreemstRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBumonFreemst xmlns="{$xmlns}">
                <id>13</id>
            </getBumonFreemst>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBumonFreemstRequestForSerialize(): GetBumonFreemstRequestModel
    {
        $freemst = new GetBumonFreemstRequestModel();
        $getBumonFreemst = $freemst->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFreemst;
    }

    public function GetBumonFreemstRequestOK(): GetBumonFreemstRequestModel
    {
        $freemst = new GetBumonFreemstRequestModel();
        $getBumonFreemst = $freemst->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFreemst;
    }
    public function GetBumonFreemstRequestNG(): GetBumonFreemstRequestModel
    {
        $freemst = new GetBumonFreemstRequestModel();
        $getBumonFreemst = $freemst->setId(-1);
        return $getBumonFreemst;
    }
    public function testRequestGetBumonFreemstOK()
    {
        try {
            $getBumonFreemstRequest = $this->GetBumonFreemstRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreemstMethod()
                                        ->withRequest($getBumonFreemstRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreemstResponseModel $responseObj */
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

        $this->assertEquals(111102, $freemst1->getKubun());
        $this->assertEquals("部門フリー１０２", $freemst1->getName());
        $this->assertEquals(0, $freemst1->getType());
        $this->assertEquals(3, $freemst1->getJyun());
        $this->assertEquals(0, $freemst1->getReqflg());
        $this->assertEquals("", $freemst1->getExplanation());
        $this->assertEquals(null, $freemst1->getOyakubun());
        $this->assertEquals("", $freemst1->getBgcolor());
        $this->assertEquals(0, $freemst1->getRpos());
        $this->assertEquals(0, $freemst1->getLeng());

        $this->assertEquals(211100, $freemst2->getKubun());
        $this->assertEquals("部門フリー１００", $freemst2->getName());
        $this->assertEquals(0, $freemst2->getType());
        $this->assertEquals(1, $freemst2->getJyun());
        $this->assertEquals(0, $freemst2->getReqflg());
        $this->assertEquals("", $freemst2->getExplanation());
        $this->assertEquals(null, $freemst2->getOyakubun());
        $this->assertEquals("", $freemst2->getBgcolor());
        $this->assertEquals(0, $freemst2->getRpos());
        $this->assertEquals(0, $freemst2->getLeng());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBumonFreemstNG()
    {
        try {
            $getBumonFreemstRequest = $this->GetBumonFreemstRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreemstMethod()
                                        ->withRequest($getBumonFreemstRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreemstResponseModel $responseObj */
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
