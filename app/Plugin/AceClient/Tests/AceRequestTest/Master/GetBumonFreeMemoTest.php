<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetBumonFreeMemo\GetBumonFreeMemoRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreeMemo\GetBumonFreeMemoResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetBumonFreeMemoRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetBumonFreeMemo()
    {
        $getBumonFreeMemoRequestModel = $this->GetBumonFreeMemoRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getBumonFreeMemoRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getBumonFreeMemo xmlns="{$xmlns}">
                <id>13</id>
            </getBumonFreeMemo>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetBumonFreeMemoRequestForSerialize(): GetBumonFreeMemoRequestModel
    {
        $freeMemo = new GetBumonFreeMemoRequestModel();
        $getBumonFreeMemo = $freeMemo->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFreeMemo;
    }

    public function GetBumonFreeMemoRequestOK(): GetBumonFreeMemoRequestModel
    {
        $freeMemo = new GetBumonFreeMemoRequestModel();
        $getBumonFreeMemo = $freeMemo->setId(OverviewMapper::ACE_TEST_SYID);
        return $getBumonFreeMemo;
    }
    public function GetBumonFreeMemoRequestNG(): GetBumonFreeMemoRequestModel
    {
        $freeMemo = new GetBumonFreeMemoRequestModel();
        $getBumonFreeMemo = $freeMemo->setId(-1);
        return $getBumonFreeMemo;
    }
    public function testRequestGetBumonFreeMemoOK()
    {
        try {
            $getBumonFreeMemoRequest = $this->GetBumonFreeMemoRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreeMemoMethod()
                                        ->withRequest($getBumonFreeMemoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreeMemoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freememo1 = $responseObj->getMaster()->getFreeMemo()[0];
                $freememo2 = $responseObj->getMaster()->getFreeMemo()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(211001, $freememo1->getKubun());
        $this->assertEquals("100", $freememo1->getFoid());
        $this->assertEquals("メモ部門２１１００１１００", $freememo1->getMemo());

        $this->assertEquals(211002, $freememo2->getKubun());
        $this->assertEquals("102", $freememo2->getFoid());
        $this->assertEquals("メモ部門２１１００１１００２", $freememo2->getMemo());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetBumonFreeMemoNG()
    {
        try {
            $getBumonFreeMemoRequest = $this->GetBumonFreeMemoRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetBumonFreeMemoMethod()
                                        ->withRequest($getBumonFreeMemoRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetBumonFreeMemoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $freememo = $responseObj->getMaster()->getFreeMemo();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $freememo);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
