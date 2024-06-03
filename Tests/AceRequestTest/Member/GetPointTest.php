<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\AceServices\Model\Request\Member\GetPoint\GetPointRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPoint\GetPointResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class GetPointRequestModelTest extends AceRequestTestAbtract
{
    public function testCallGetPointRequestModel()
    {

        $point = new GetPointRequestModel();
        $point->setId(0)->setMcode("1234");
        $this->assertEquals(0, $point->getId());
        $this->assertEquals(1234, $point->getMcode());
    }

    public function testRequestGetPointOK()
    {
        try {
            $getPointRequest = $this->getGetPointRequestModelOK();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetPointMethod()
                                        ->withRequest($getPointRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPointResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $point = $responseObj->getMember()
                                        ->getPoint()
                                        ->getPoint();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(5447, $point);
        $this->assertEquals('', $message1);
        $this->assertEquals('', $message2);
    }

    
    public function testRequestGetPointNG()
    {
        try {
            $getPointRequest = $this->getGetPointRequestModelNG();
            $response = $this->aceClient->makeMemberService()
                                        ->makeGetPointMethod()
                                        ->withRequest($getPointRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetPointResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $point = $responseObj->getMember()->getPoint() ? $responseObj->getMember()->getPoint()->getPoint() : null;
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(null, $point);
        $this->assertEquals(null, $message1);
        $this->assertEquals('', $message2);
    }

    public function getGetPointRequestModelOK()
    {
        $point = new GetPointRequestModel();
        $point->setId(7)->setMcode(2);
        return $point;
    }

    public function getGetPointRequestModelNG()
    {
        $point = new GetPointRequestModel();
        $point->setId(-999)->setMcode(1);
        return $point;
    }

}