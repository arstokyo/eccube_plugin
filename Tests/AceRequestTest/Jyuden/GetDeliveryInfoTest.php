<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Plugin\AceClient\AceServices\Model\Request\Jyuden\GetDeliveryInfo\GetDeliveryInfoRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\GetDeliveryInfo\GetDeliveryInfoResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetDeliveryInfoRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetDeliveryInfo()
    {
        $getDeliveryInfoRequestModel = $this->GetDeliveryInfoRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getDeliveryInfoRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getDeliveryInfo xmlns="{$xmlns}">
                <id>13</id>
                <execDateFrom>2024/05/24 17:00:00</execDateFrom>
                <execDateTo>2024/05/24 17:05:00</execDateTo>
            </getDeliveryInfo>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetDeliveryInfoRequestForSerialize(): GetDeliveryInfoRequestModel
    {
        $Delivery = new GetDeliveryInfoRequestModel();
        $getDeliveryInfo = $Delivery->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setExecDateFrom("2024/05/24 17:00:00")
                          ->setExecDateTo("2024/05/24 17:05:00");
        return $getDeliveryInfo;
    }

    public function GetDeliveryInfoRequestOK(): GetDeliveryInfoRequestModel
    {
        $Delivery = new GetDeliveryInfoRequestModel();
        $getDeliveryInfo = $Delivery->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setExecDateFrom("2024/05/27 00:00:00")
                          ->setExecDateTo("2024/05/27 17:00:00");
        return $getDeliveryInfo;
    }
    public function GetDeliveryInfoRequestNG(): GetDeliveryInfoRequestModel
    {
        $Delivery = new GetDeliveryInfoRequestModel();
        $getDeliveryInfo = $Delivery->setId(-1);
        return $getDeliveryInfo;
    }
    public function testRequestGetDeliveryInfoOK()
    {
        try {
            $getDeliveryInfoRequest = $this->GetDeliveryInfoRequestOK();
            $response = $this->aceClient->makeJyudenService()
                                       ->makeGetDeliveryInfoMethod()
                                       ->withRequest($getDeliveryInfoRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetDeliveryInfoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getJyuden()->getMessage()->getMessage1();
                $jyuden1 = $responseObj->getJyuden()->getDelivery()[0];
                $jyuden2 = $responseObj->getJyuden()->getDelivery()[2];
                $message = $responseObj->getJyuden()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("sanonaoko@hotmail.com", $jyuden1->getMail());
        $this->assertEquals(167, $jyuden1->getDenno());
        $this->assertEquals(1, $jyuden1->getLine());
        $this->assertEquals("100", $jyuden1->getGdid());
        $this->assertEquals("商品100", $jyuden1->getGname());
        $this->assertEquals(1, $jyuden1->getSuu());
        $this->assertEquals("", $jyuden1->getOkurino());
        $this->assertEquals("130", $jyuden1->getJmemid());
        $this->assertEquals("佐野 直子", $jyuden1->getJname());
        $this->assertEquals("サノ　ナオコ", $jyuden1->getJkana());
        $this->assertEquals("028-2422", $jyuden1->getJzip());
        $this->assertEquals("岩手県宮古市小国第2ビル 5F", $jyuden1->getJadr());
        $this->assertEquals("0193999301", $jyuden1->getJtel());
        $this->assertEquals("130", $jyuden1->getNmemid());
        $this->assertEquals("佐野 直子", $jyuden1->getNname());
        $this->assertEquals("サノ　ナオコ", $jyuden1->getNkana());
        $this->assertEquals("028-2422", $jyuden1->getNzip());
        $this->assertEquals("岩手県宮古市小国第2ビル 5F", $jyuden1->getNadr());
        $this->assertEquals("0193999301", $jyuden1->getNtel());
        $this->assertEquals("2024-05-27", $jyuden1->getSday()->toShortDate());
        $this->assertEquals("2024-06-10", $jyuden1->getHday()->toShortDate());
        $this->assertEquals("午前中", $jyuden1->getHkname());

        $this->assertEquals("decisionCart@AceClient.v1.0", $jyuden2->getMail());
        $this->assertEquals(171, $jyuden2->getDenno());
        $this->assertEquals(1, $jyuden2->getLine());
        $this->assertEquals("100", $jyuden2->getGdid());
        $this->assertEquals("商品100", $jyuden2->getGname());
        $this->assertEquals(10, $jyuden2->getSuu());
        $this->assertEquals("", $jyuden2->getOkurino());
        $this->assertEquals("114", $jyuden2->getJmemid());
        $this->assertEquals("DecisionCartTest", $jyuden2->getJname());
        $this->assertEquals("DecisionCartTest", $jyuden2->getJkana());
        $this->assertEquals("104-0061", $jyuden2->getJzip());
        $this->assertEquals("東京都中央区銀座", $jyuden2->getJadr());
        $this->assertEquals("0989999888", $jyuden2->getJtel());
        $this->assertEquals("114", $jyuden2->getNmemid());
        $this->assertEquals("DecisionCartTest", $jyuden2->getNname());
        $this->assertEquals("DecisionCartTest", $jyuden2->getNkana());
        $this->assertEquals("104-0061", $jyuden2->getNzip());
        $this->assertEquals("東京都中央区銀座", $jyuden2->getNadr());
        $this->assertEquals("0989999888", $jyuden2->getNtel());
        $this->assertEquals("2024-05-27", $jyuden2->getSday()->toShortDate());
        $this->assertEquals("2024-06-10", $jyuden2->getHday()->toShortDate());
        $this->assertEquals("午前中", $jyuden2->getHkname());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetDeliveryInfoNG()
    {
        try {
            $getDeliveryInfoRequest = $this->GetDeliveryInfoRequestNG();
            $response = $this->aceClient->makeJyudenService()
                                       ->makeGetDeliveryInfoMethod()
                                       ->withRequest($getDeliveryInfoRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetDeliveryInfoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getJyuden()->getMessage()->getMessage1();
                $jyuden = $responseObj->getJyuden()->getDelivery();
                $message = $responseObj->getJyuden()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $jyuden);
        $this->assertEquals("該当出荷完了情報がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
