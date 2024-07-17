<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetMemAnkFreemst\GetMemAnkFreemstRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetMemAnkFreemst\GetMemAnkFreemstResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetMemAnkFreemstRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetMemAnkFreemst()
    {
        $getMemAnkFreemstRequestModel = $this->GetMemAnkFreemstRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getMemAnkFreemstRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getMemAnkFreemst xmlns="{$xmlns}">
                <id>13</id>
            </getMemAnkFreemst>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetMemAnkFreemstRequestForSerialize(): GetMemAnkFreemstRequestModel
    {
        $freemst = new GetMemAnkFreemstRequestModel();
        $getMemAnkFreemst = $freemst->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemAnkFreemst;
    }

    public function GetMemAnkFreemstRequestOK(): GetMemAnkFreemstRequestModel
    {
        $freemst = new GetMemAnkFreemstRequestModel();
        $getMemAnkFreemst = $freemst->setId(OverviewMapper::ACE_TEST_SYID);
        return $getMemAnkFreemst;
    }
    public function GetMemAnkFreemstRequestNG(): GetMemAnkFreemstRequestModel
    {
        $freemst = new GetMemAnkFreemstRequestModel();
        $getMemAnkFreemst = $freemst->setId(-1);
        return $getMemAnkFreemst;
    }
    public function testRequestGetMemAnkFreemstOK()
    {
        try {
            $getMemAnkFreemstRequest = $this->GetMemAnkFreemstRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemAnkFreemstMethod()
                                        ->withRequest($getMemAnkFreemstRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemAnkFreemstResponseModel $responseObj */
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

        $this->assertEquals(105001, $freemst1->getKubun());
        $this->assertEquals("チェック・曜日制限", $freemst1->getName());
        $this->assertEquals(0, $freemst1->getType());
        $this->assertEquals(1, $freemst1->getJyun());
        $this->assertEquals(0, $freemst1->getReqflg());
        $this->assertEquals("", $freemst1->getExplanation());
        $this->assertEquals(0, $freemst1->getOyakubun());
        $this->assertEquals("00FFFF", $freemst1->getBgcolor());
        $this->assertEquals(0, $freemst1->getRpos());
        $this->assertEquals(0, $freemst1->getLeng());

        $this->assertEquals(105002, $freemst2->getKubun());
        $this->assertEquals("2スポーツ", $freemst2->getName());
        $this->assertEquals(0, $freemst2->getType());
        $this->assertEquals(2, $freemst2->getJyun());
        $this->assertEquals(0, $freemst2->getReqflg());
        $this->assertEquals("", $freemst2->getExplanation());
        $this->assertEquals(0, $freemst2->getOyakubun());
        $this->assertEquals("", $freemst2->getBgcolor());
        $this->assertEquals(0, $freemst2->getRpos());
        $this->assertEquals(0, $freemst2->getLeng());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetMemAnkFreemstNG()
    {
        try {
            $getMemAnkFreemstRequest = $this->GetMemAnkFreemstRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetMemAnkFreemstMethod()
                                        ->withRequest($getMemAnkFreemstRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetMemAnkFreemstResponseModel $responseObj */
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
