<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\MemberPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\NmemberModel;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModel;;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;

class RegMemberAdrTest extends AbstractAdminWebTestCase
{
    private ?string $testMbid = '102';
    public function testCallRegmemberAdr()
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('09876543210')
                                                   ->setZip('123-567')
                                                   ->setAdr1('address1')
                                                   ->setAdr2('address2')
                                                   ->setAdr3('address3')
                                                   ->setAdr4('address4')
                                                   ->setCode($this->testMbid)
                                                   ->setSimei('Shimei')
                                                   ->setKana('カナ')
                                                   ->setBikou1('bikou1')
                                                   ->setBikou2('bikou2')
                                                   ->setBikou3('bikou3')
                                                   ->setBetu(0));
        $regMemAdr = new RegMemAdrRequestModel();
        $regMemAdr->setId(OverviewMapper::ACE_TEST_SYID)->setPrm($memberPrm);
        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $regMemAdr->getId());

        $expectedPrmData = 
        preg_replace('/\s+/', '',
        <<<'XML'
        <?xml version="1.0" encoding="UTF-8"?>
        <member>
        <nmember>
            <eda>1</eda>
            <code>102</code>
            <adr1>address1</adr1>
            <adr2>address2</adr2>
            <adr3>address3</adr3>
            <adr4>address4</adr4>
            <simei>Shimei</simei>
            <kana>カナ</kana>
            <zip>123-567</zip>
            <tel>09876543210</tel>
            <bikou1>bikou1</bikou1>
            <bikou2>bikou2</bikou2>
            <bikou3>bikou3</bikou3>
            <betu>0</betu>
            <fax>1234567890</fax>
        </nmember>
        </member>
        XML);
        $prmData = preg_replace('/\s+/', '',$regMemAdr->getPrm());
        $this->assertEquals($expectedPrmData, $prmData);

    }

    public function testRequestRegMemberAdrNG()
    {
        try {
            $getPointRequest = $this->getRegmemberRequestModelNG();
            $response = (new AceClient)->makeMemberService()
                                       ->makeRegMemAdrMethod()
                                       ->withRequest($getPointRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemAdrResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $nmem = $responseObj->getMember()->getNmember();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(null, $nmem);
        $this->assertEquals('[Nmember]:氏名(simei):未記入', $message1);
        $this->assertEquals('', $message2);
    }

    public function getRegmemberRequestModelNG(): RegMemAdrRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('9876543210')
                                                   ->setZip('1234567')
                                                   ->setAdr1('address1')
                                                   ->setAdr2('address2')
                                                   ->setCode('999')
                                                );
        $regMemAdr = new RegMemAdrRequestModel();
        return $regMemAdr->setId(OverviewMapper::ACE_TEST_SYID)->setPrm($memberPrm);
    }

    public function getRegmemberRequestModelOK(): RegMemAdrRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('09876543210')
                                                   ->setZip('399-3802')
                                                   ->setAdr1('長野県')
                                                   ->setAdr2('住所2')
                                                   ->setAdr3('住所3')
                                                   ->setAdr4('住所4')
                                                   ->setCode($this->testMbid)
                                                   ->setSimei('テスト')
                                                   ->setKana('トン')
                                                   ->setBikou1('備考1')
                                                   ->setBikou2('備考2')
                                                   ->setBikou3('備考3'));
        return (new RegMemAdrRequestModel())->setId(OverviewMapper::ACE_TEST_SYID)->setPrm($memberPrm);
    }

    public function testRequestRegMemberAdrOK()
    {
        try {
            $getPointRequest = $this->getRegmemberRequestModelOK();
            $response = (new AceClient)->makeMemberService()
                                       ->makeRegMemAdrMethod()
                                       ->withRequest($getPointRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemAdrResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $nmem = $responseObj->getMember()->getNmember();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(1, $nmem->getEda());
        $this->assertEquals(null, $nmem->getFax());
        $this->assertEquals('09876543210', $nmem->getTel());
        $this->assertEquals('399-3802', $nmem->getZip());
        $this->assertEquals('長野県', $nmem->getAdr1());
        $this->assertEquals('住所2', $nmem->getAdr2());
        $this->assertEquals('住所3', $nmem->getAdr3());
        $this->assertEquals('住所4', $nmem->getAdr4());
        $this->assertEquals($this->testMbid, $nmem->getCode());
        $this->assertEquals('テスト', $nmem->getAdrName());
        $this->assertEquals('備考1', $nmem->getAdrBikou1());
        $this->assertEquals('備考2', $nmem->getAdrBikou2());
        $this->assertEquals('備考3', $nmem->getAdrBikou3());
        $this->assertEquals('', $message1);
        $this->assertEquals('', $message2);
    }

    public function testNotAllowNullParameterCase1()
    {
        try {
            $getPointRequest = $this->getNotAllowParameterCase1();
            $response = (new AceClient)->makeMemberService()
                                       ->makeRegMemAdrMethod()
                                       ->withRequest($getPointRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemAdrResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $nmem = $responseObj->getMember()->getNmember();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $errMsg = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $errMsg = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertStringStartsWith('Not nullable parameters are null.', $errMsg);
    }

    private function getNotAllowParameterCase1() : RegMemAdrRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('09876543210')
                                                   ->setZip('399-3802')
                                                   ->setAdr1('長野県')
                                                   ->setAdr2('住所2')
                                                   ->setAdr3('住所3')
                                                   ->setAdr4('住所4')
                                                   ->setCode(100)
                                                   ->setSimei('テスト')
                                                   ->setKana('トン')
                                                   ->setBikou1('備考1')
                                                   ->setBikou2('備考2')
                                                   ->setBikou3('備考3'));
        return (new RegMemAdrRequestModel())->setPrm($memberPrm);
    }

    public function testNotAllowNullParameterCase2()
    {
        try {
            $getPointRequest = $this->getNotAllowParameterCase2();
            $response = (new AceClient)->makeMemberService()
                                       ->makeRegMemAdrMethod()
                                       ->withRequest($getPointRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemAdrResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $nmem = $responseObj->getMember()->getNmember();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $errMsg = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $errMsg = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertStringStartsWith('Not nullable parameters are null.', $errMsg);
    }

    private function getNotAllowParameterCase2() : RegMemAdrRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('09876543210')
                                                   ->setZip('399-3802')
                                                   ->setAdr1('長野県')
                                                   ->setAdr2('住所2')
                                                   ->setAdr3('住所3')
                                                   ->setAdr4('住所4')
                                                   ->setSimei('テスト')
                                                   ->setKana('トン')
                                                   ->setBikou1('備考1')
                                                   ->setBikou2('備考2')
                                                   ->setBikou3('備考3'));
        return (new RegMemAdrRequestModel())->setId(OverviewMapper::ACE_TEST_SYID)->setPrm($memberPrm);
    }


}