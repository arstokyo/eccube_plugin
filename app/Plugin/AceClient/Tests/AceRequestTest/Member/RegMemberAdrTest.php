<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\MemberPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\NmemberModel;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModel;;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;

class RegMemberAdrTest extends AbstractAdminWebTestCase
{
    
    public function testCallRegmemberAdr()
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('9876543210')
                                                   ->setZip('1234567')
                                                   ->setAdr1('address1')
                                                   ->setAdr2('address2'));
        $regMemAdr = new RegMemAdrRequestModel();
        $regMemAdr->setId(1)->setPrm($memberPrm);
        $this->assertEquals(1, $regMemAdr->getId());

        $expectedPrmData = 
        preg_replace('/\s+/', '',
        <<<'XML'
        <?xml version="1.0" encoding="Shift_JIS"?>
        <member>
        <nmember>
            <betu/>
            <fax>1234567890</fax>
            <eda>1</eda>
            <code/>
            <simei/>
            <tel>9876543210</tel>
            <zip>1234567</zip>
            <kana/>
            <adr1>address1</adr1>
            <adr2>address2</adr2>
            <adr3/>
            <adr4/>
            <bikou1/>
            <bikou2/>
            <bikou3/>
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
                                                   ->setCode('1'));
        $regMemAdr = new RegMemAdrRequestModel();
        return $regMemAdr->setId(7)->setPrm($memberPrm);
    }

    public function getRegmemberRequestModelOK(): RegMemAdrRequestModel
    {
        $memberPrm = new MemberPrmModel();
        $memberPrm->setNmember((new NmemberModel())->setEda(1)
                                                   ->setFax('1234567890')
                                                   ->setTel('9876543210')
                                                   ->setZip('1234567')
                                                   ->setAdr1('address1')
                                                   ->setAdr2('address2')
                                                   ->setCode('1')
                                                   ->setSimei('Thong'));
        $regMemAdr = new RegMemAdrRequestModel();
        return $regMemAdr->setId(7)->setPrm($memberPrm);
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
        $this->assertEquals('[Nmember]:氏名(simei):未記入', $message1);
        $this->assertEquals('', $message2);
    }

}