<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\GetHaisoAdrs\GetHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisoAdrsResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;

class GetHaisoAdrsRequestModelTest extends AceRequestTestAbtract
{
    public function getHaisoAdrsRequestModelOK(?string $c)
    {
        $memberPrm = new GetHaisoAdrsRequestModel();
        $memberPrm->setId(OverviewMapper::ACE_TEST_SYID)->setMcode($c);
        return $memberPrm;
    }

    public function getHaisoAdrsRequestModelNG(?string $c)
    {
        $memberPrm = new GetHaisoAdrsRequestModel();
        $memberPrm->setId(OverviewMapper::ACE_TEST_SYID)->setMcode($c);
        return $memberPrm;
    }

    public function testRequestGetHaisoAdrsMethodOK()
    {
    try {
        $code = 103;

        $getHaisoAdrsRequest = $this->getHaisoAdrsRequestModelOK($code);

        $response = $this->aceClient->makeMemberService()
                                    ->makeGetHaisoAdrsMethod()
                                    ->withRequest($getHaisoAdrsRequest)
                                    ->send();
        if ($response->getStatusCode() === 200) {
            /** @var GetHaisoAdrsResponseModel $responseObj */
            $responseObj = $response->getResponse();
            $defaultHaiso = \current($responseObj->getMember()->getGetHaisouAdrs());
            $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
            $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
        }
    } catch(ClientException $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    } catch(\Throwable $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    }
    $this->assertNotNull($defaultHaiso);
    $this->assertEquals('103',$defaultHaiso->getCode());
    $this->assertEquals('東京都',$defaultHaiso->getAdr1());
    $this->assertEquals('住所2',$defaultHaiso->getAdr2());
    $this->assertEquals('住所3',$defaultHaiso->getAdr3());
    $this->assertEquals('住所4', $defaultHaiso->getAdr4());
    $this->assertEquals('CheckGetHaisouAdrTest', $defaultHaiso->getSimei());
    $this->assertEquals('', $defaultHaiso->getKana());
    $this->assertEquals('110-0005', $defaultHaiso->getZip());
    $this->assertEquals('08000000000', $defaultHaiso->getTel());
    $this->assertEquals('13106', $defaultHaiso->getArea());
    $this->assertEquals('', $defaultHaiso->getCbar());
    $this->assertEquals('会社名', $defaultHaiso->getAdrbikou1());
    $this->assertEquals('建物名', $defaultHaiso->getAdrbikou2());
    $this->assertEquals('', $defaultHaiso->getAdrbikou3());
    $this->assertEquals('東京都', $defaultHaiso->getCnvadr1());
    $this->assertEquals('住所２', $defaultHaiso->getCnvadr2());
    $this->assertEquals('住所３', $defaultHaiso->getCnvadr3());
    $this->assertEquals('住所４', $defaultHaiso->getCnvadr4());
    $this->assertEquals('', $message1);
    $this->assertEquals('', $message2);
    
    }

    public function testRequestGetHaisoAdrsMethodNG()
    {
    try {
        $code = 'nobody';
        $getHaisoAdrsRequest = $this->getHaisoAdrsRequestModelNG($code);
        $response = $this->aceClient->makeMemberService()
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
    public function testRequestGetHaisoAdrsReponseAsList()
    {
    try {
        $code = 104;
        $getHaisoAdrsRequest = $this->getHaisoAdrsRequestModelOK($code);
        $response = $this->aceClient->makeMemberService()
                                    ->makeGetHaisoAdrsMethod()
                                    ->withRequest($getHaisoAdrsRequest)
                                    ->send();
        if ($response->getStatusCode() === 200) {
            /** @var GetHaisoAdrsResponseModel $responseObj */
            $responseObj = $response->getResponse();
            $haisouAdrs = $responseObj->getMember()->getGetHaisouAdrs();
            $haiso1 = $haisouAdrs[0];
            $haiso2 = $haisouAdrs[1];
            $haiso3 = $haisouAdrs[2];
            $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
            $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
        }
    } catch(ClientException $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    } catch(\Throwable $e) {
        $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
    }
    $this->assertNotNull($haisouAdrs);

    $this->assertEquals('104', $haiso1->getCode());
    $this->assertEquals('CheckGetHaisouAdrTestMany', $haiso1->getSimei());
    $this->assertNull( $haiso1->getKana());
    $this->assertEquals('110-0007', $haiso1->getZip());
    $this->assertEquals('東京都', $haiso1->getAdr1());
    $this->assertEquals('住所2', $haiso1->getAdr2());
    $this->assertEquals('住所3', $haiso1->getAdr3());
    $this->assertEquals('住所4', $haiso1->getAdr4());
    $this->assertEquals('08000000000', $haiso1->getTel());
    $this->assertEquals('13106', $haiso1->getArea());
    $this->assertEquals('', $haiso1->getCbar());
    $this->assertEquals('会社名', $haiso1->getAdrbikou1());
    $this->assertEquals('建物名', $haiso1->getAdrbikou2());
    $this->assertEquals('', $haiso1->getAdrbikou3());
    $this->assertEquals('CheckGetHaisouAdrTestMany', $haiso1->getSimei());
    $this->assertEquals('東京都', $haiso1->getCnvadr1());
    $this->assertEquals('住所２', $haiso1->getCnvadr2());
    $this->assertEquals('住所３', $haiso1->getCnvadr3());
    $this->assertEquals('住所４', $haiso1->getCnvadr4());

    $this->assertEquals('104', $haiso2->getCode());
    $this->assertEquals('Betu1', $haiso2->getSimei());
    $this->assertNull( $haiso2->getKana());
    $this->assertEquals('110-0008', $haiso2->getZip());
    $this->assertEquals('東京都', $haiso2->getAdr1());
    $this->assertEquals('別住所2', $haiso2->getAdr2());
    $this->assertEquals('別住所3', $haiso2->getAdr3());
    $this->assertEquals('別住所4', $haiso2->getAdr4());
    $this->assertEquals('08000000000', $haiso2->getTel());
    $this->assertEquals('13106', $haiso2->getArea());
    $this->assertEquals('', $haiso2->getCbar());
    $this->assertEquals('別会社名', $haiso2->getAdrbikou1());
    $this->assertEquals('別建物名', $haiso2->getAdrbikou2());
    $this->assertEquals('', $haiso2->getAdrbikou3());
    $this->assertEquals('Betu1', $haiso2->getSimei());
    $this->assertEquals('東京都', $haiso2->getCnvadr1());
    $this->assertEquals('別住所２', $haiso2->getCnvadr2());
    $this->assertEquals('別住所３', $haiso2->getCnvadr3());
    $this->assertEquals('別住所４', $haiso2->getCnvadr4());

    $this->assertEquals('104', $haiso3->getCode());
    $this->assertEquals('Betu2', $haiso3->getSimei());
    $this->assertNull( $haiso3->getKana());
    $this->assertEquals('110-0001', $haiso3->getZip());
    $this->assertEquals('東京都', $haiso3->getAdr1());
    $this->assertEquals('別住所2', $haiso3->getAdr2());
    $this->assertEquals('別住所3', $haiso3->getAdr3());
    $this->assertEquals('別住所4', $haiso3->getAdr4());
    $this->assertEquals('08000000000', $haiso3->getTel());
    $this->assertEquals('13106', $haiso3->getArea());
    $this->assertEquals('', $haiso3->getCbar());
    $this->assertEquals('別会社名', $haiso3->getAdrbikou1());
    $this->assertEquals('別建物名', $haiso3->getAdrbikou2());
    $this->assertEquals('', $haiso3->getAdrbikou3());
    $this->assertEquals('Betu2', $haiso3->getSimei());
    $this->assertEquals('東京都', $haiso3->getCnvadr1());
    $this->assertEquals('別住所２', $haiso3->getCnvadr2());
    $this->assertEquals('別住所３', $haiso3->getCnvadr3());
    $this->assertEquals('別住所４', $haiso3->getCnvadr4());
    
    $this->assertEquals('',$message1);
    $this->assertEquals('',$message2);
    }

}