<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\UpdateTaikai\UpdateTaikaiRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\UpdateTaikai\UpdateTaikaiResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Util\Serializer;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;


class UpdateTaikaiRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeUpdateTaikai()
    {
        $UpdateTaikaiRequestModel = $this->UpdateTaikaiRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($UpdateTaikaiRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <updateTaikai xmlns="{$xmlns}">
                <id>13</id>
                <mcode>222</mcode>
                <taikai>111</taikai>
            </updateTaikai>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function UpdateTaikaiRequestForSerialize(): UpdateTaikaiRequestModel
    {
        $taikai = new UpdateTaikaiRequestModel();
        $UpdateTaikai = $taikai->setId(OverviewMapper::ACE_TEST_SYID)
                               ->setMcode("222")
                               ->setTaikai(111);
        return $UpdateTaikai;
    }

    public function UpdateTaikaiRequestOK(): UpdateTaikaiRequestModel
    {
        $taikai = new UpdateTaikaiRequestModel();
        $UpdateTaikai = $taikai->setId(OverviewMapper::ACE_TEST_SYID)
                               ->setMcode("203")
                               ->setTaikai(1);
        return $UpdateTaikai;
    }
    public function UpdateTaikaiRequestNG(): UpdateTaikaiRequestModel
    {
        $taikai = new UpdateTaikaiRequestModel();
        $UpdateTaikai = $taikai->setId(-1)
                               ->setMcode("203")
                               ->setTaikai(1);
        return $UpdateTaikai;
    }
    public function testRequestUpdateTaikaiOK()
    {
        try {
            $updateTaikaiRequest = $this->UpdateTaikaiRequestOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeUpdateTaikaiMethod()
                                        ->withRequest($updateTaikaiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var UpdateTaikaiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $memweb = $responseObj->getMember()->getMemweb();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("203", $memweb->getCode());
        $this->assertEquals(1, $memweb->getTaikai());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestUpdateTaikaiNG()
    {
        try {
            $updateTaikaiRequest = $this->UpdateTaikaiRequestNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeUpdateTaikaiMethod()
                                        ->withRequest($updateTaikaiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var UpdateTaikaiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $memweb = $responseObj->getMember()->getMemweb();
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $memweb);
        $this->assertEquals(null, $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
