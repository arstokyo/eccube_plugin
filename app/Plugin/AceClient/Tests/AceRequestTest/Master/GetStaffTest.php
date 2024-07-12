<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Master;

use Plugin\AceClient43\AceServices\Model\Request\Master\GetStaff\GetStaffRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetStaff\GetStaffResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class GetStaffRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetStaff()
    {
        $getStaffRequestModel = $this->GetStaffRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getStaffRequestModel);
        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getStaff xmlns="{$xmlns}">
                <id>13</id>
            </getStaff>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetStaffRequestForSerialize(): GetStaffRequestModel
    {
        $staff = new GetStaffRequestModel();
        $getStaff = $staff->setId(OverviewMapper::ACE_TEST_SYID);
        return $getStaff;
    }

    public function GetStaffRequestOK(): GetStaffRequestModel
    {
        $staff = new GetStaffRequestModel();
        $getStaff = $staff->setId(OverviewMapper::ACE_TEST_SYID);
        return $getStaff;
    }
    public function GetStaffRequestNG(): GetStaffRequestModel
    {
        $staff = new GetStaffRequestModel();
        $getStaff = $staff->setId(-1);
        return $getStaff;
    }
    public function testRequestGetStaffOK()
    {
        try {
            $getStaffRequest = $this->GetStaffRequestOK();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetStaffMethod()
                                        ->withRequest($getStaffRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetStaffResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $staff1 = $responseObj->getMaster()->getStaff()[0];
                $staff2 = $responseObj->getMaster()->getStaff()[1];
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("1", $staff1->getCode());
        $this->assertEquals("テストユーザー", $staff1->getName());

        $this->assertEquals("19860605", $staff2->getCode());
        $this->assertEquals("19860605", $staff2->getName());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetStaffNG()
    {
        try {
            $getStaffRequest = $this->GetStaffRequestNG();
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetStaffMethod()
                                        ->withRequest($getStaffRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetStaffResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $staff = $responseObj->getMaster()->getStaff();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $staff);
        $this->assertEquals("ＷＥＢ初期設定がありません", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
