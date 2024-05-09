<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\GetHaisoAdrs\GetHaisoAdrsRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisoAdrsResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;

class GetHaisoAdrsRequestModelTest extends AbstractAdminWebTestCase
{
    public function testGetHaisoAdrsRequestModelOK(?string $c)
    {
        $memberPrm = new GetHaisoAdrsRequestModel();
        $memberPrm->setId(13)->setMcode($c);

        return $memberPrm;
    }

    public function testGetHaisoAdrsRequestModelNG(?string $c)
    {
        $memberPrm = new GetHaisoAdrsRequestModel();
        $memberPrm->setId(13)->setMcode($c);

        return $memberPrm;
    }

    public function testRequestGetHaisoAdrsMethodOK()
    {
    try {
        $code = 103;
        $getHaisoAdrsRequest = $this->testGetHaisoAdrsRequestModelOK($code);
        $response = (new AceClient)->makeMemberService()
                                   ->makeGetHaisoAdrsMethod()
                                   ->withRequest($getHaisoAdrsRequest)
                                   ->send();
        if ($response->getStatusCode() === 200) {
            /** @var GetHaisoAdrsResponseModel $responseObj */
            $responseObj = $response->getResponse();
            $haisouAdrs = $responseObj->getMember();
            $membercode = $responseObj->getMember()->getGetHaisouAdrs()->getCode();
            $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
            $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
        }
    } catch(ClientException $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    } catch(\Throwable $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    }
    $this->assertNotNull($haisouAdrs);
    $this->assertEquals($code, $membercode);
    $this->assertEquals('', $message1);
    $this->assertEquals('', $message2);
    
    }

    public function testRequestGetHaisoAdrsMethodNG()
    {
    try {
        $code = 'nobody';
        $getHaisoAdrsRequest = $this->testGetHaisoAdrsRequestModelNG($code);
        $response = (new AceClient)->makeMemberService()
                                   ->makeGetHaisoAdrsMethod()
                                   ->withRequest($getHaisoAdrsRequest)
                                   ->send();
        if ($response->getStatusCode() === 200) {
            /** @var GetHaisoAdrsResponseModel $responseObj */
            $responseObj = $response->getResponse();
            $haisouAdrs = $responseObj->getMember()->getGetHaisouAdrs();
            $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
            $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
        }
    } catch(ClientException $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    } catch(\Throwable $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    }
    $this->assertNull($haisouAdrs);
    $this->assertEquals('顧客住所が存在しません', $message1);
    // message2 is SQL statement
    $this->assertNotEquals('', $message2);
    
    }
}