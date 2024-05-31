<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMember\RegMemberResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;

class RegMemberTest extends AceRequestTestAbtract
{
    private ?string $sessionid = '1234';
    private ?string $testJmemid = '111';
    private ?string $testNmemid = '111';
    private ?string $testSmemid = '116';

    public function getRegmemberRequestModelCase1(): RegMember\RegMemberRequestModel
    {
        $memberPrm = (new RegMember\MemberPrmModel)
                            ->setJmember((new RegMember\JmemberModel())
                                            ->setCode($this->testJmemid)
                                            ->setSimei('RegMemberJmemTest')
                                            ->setKana('ＲｅｇＭｅｍｂｅｒＪｍｅｍＴｅｓｔ')
                                            ->setDmkbn(1)
                                            ->setZip('110-0005')
                                            ->setAdr1('東京都')
                                            ->setAdr2('住所2')
                                            ->setAdr3('住所3')
                                            ->setAdr4('住所4')
                                            ->setTel('09876543210')
                                            ->setFax('1234567890')
                                            ->setCode2('code2')
                                            ->setSex(1)
                                            ->setBirthday('2021-01-01')
                                            ->setBaitai(100)
                                            ->setBaifile(100)
                                            ->setFcode1('fcode1')
                                            ->setFcode2('fcode2')
                                            ->setFcode3('fcode3')
                                            ->setFree1('フリー1')
                                            ->setFree2('フリー2')
                                            ->setFree3('フリー3')
                                            ->setFday1('2021-01-01')
                                            ->setFday2('2021-01-02')
                                            ->setFday3('2021-01-03')
                                            ->setFmemo1('メモ1')
                                            ->setFmemo2('メモ2')
                                            ->setFmemo3('メモ3')
                                            ->setBikou1('建物名')
                                            ->setBikou2('会社名')
                                            ->setBikou3('備考3')
                                            ->setUpcode(112)
                                            ->setTankaKbn(1)
                                            ->setTorikbn(1)
                                            ->setSime(25)
                                            ->setSite(1)
                                            ->setInday(27)
                                            ->setIcode(112)
                                            ->setRitu(1.2)
                                            ->setKhasuu(0)
                                            ->setTel2('0999888777')
                                            ->setTaikai(0)
                                            ->setMobileId('09012345678')
                                            ->setPointkind(1)
                                            ->setMemmail(
                                                (new RegMember\MemMailModel())
                                                  ->setMail('regMemberJmem@AceClient.v1.0')
                                                  ->setIdx(1)
                                                  ->setDmailkbn(1)
                                            )
                                            ->setUserid($this->testJmemid)
                                            ->setPasswd('password')
                                            ->setPasswdRem(
                                                (new Regmember\PassWdRemModel())
                                                  ->setQuestion('質問')
                                                  ->setAnswer('答え')
                                            )
                                            ->setPoint(1000)
                                            ->setPointKind(1)
                        );

        return (new RegMember\RegMemberRequestModel())
                        ->setId(OverviewMapper::ACE_TEST_SYID)
                        ->setSessId($this->sessionid)
                        ->setPrm($memberPrm);
    }

    public function getRegmemberRequestModelCase2(): RegMember\RegMemberRequestModel
    {
        $requestCase1 = $this->getRegmemberRequestModelCase1();
        return $requestCase1->setPrm($requestCase1->getPrm()
                                                ->setNmember(
                                                        (new RegMember\NmemberModel())
                                                        ->setCode($this->testNmemid)
                                                        ->setEda('')
                                                        ->setSimei('RegMemberNmemTest')
                                                        ->setKana('ＲｅｇＭｅｍｂｅｒＮｍｅｍＴｅｓｔ')
                                                        ->setZip('110-0005')
                                                        ->setAdr1('東京都')
                                                        ->setAdr2('住所2')
                                                        ->setAdr3('住所3')
                                                        ->setAdr4('住所4')
                                                        ->setTel('09876543210')
                                                        ->setBikou1('備考1')
                                                        ->setBikou2('備考2')
                                                        ->setBikou3('備考3')
                                            )
                                    );
    }

    public function getRegmemberRequestModelCase3(): RegMember\RegMemberRequestModel
    {
        $requestCase2 = $this->getRegmemberRequestModelCase2();
        return $requestCase2->setPrm($requestCase2->getPrm()
                                                ->setSmember(
                                                        (new RegMember\SmemberModel())
                                                        ->setCode($this->testSmemid)
                                                        ->setSimei('RegMemberSmemTest')
                                                        ->setKana('ＲｅｇＭｅｍｂｅｒＳｍｍｅｍＴｅｓｔ')
                                                        ->setDmkbn(1)
                                                        ->setZip('101-0032')
                                                        ->setAdr1('東京都')
                                                        ->setAdr2('千代田')
                                                        ->setAdr3('区岩本町')
                                                        ->setAdr4('１丁目９−５')
                                                        ->setBikou1('FKビル5階')
                                                        ->setBikou2('エー・アール・システム株式会社')
                                                        ->setBikou3('備考3')
                                                        ->setTel('03-5811-1864')
                                                        ->setFax('03-5811-1865')
                                                        ->setTel2('03-5811-1866')
                                                        ->setCode2(123)
                                                        ->setSex(2)
                                                        ->setBirthday('1999-09-09')
                                                        ->setBaitai(100)
                                                        ->setBaifile(100)
                                                        ->setFcode1('fcode1')
                                                        ->setFcode2('fcode2')
                                                        ->setFcode3('fcode3')
                                                        ->setFree1('フリー1')
                                                        ->setFree2('フリー2')
                                                        ->setFree3('フリー3')
                                                        ->setFday1('2021-01-01')
                                                        ->setFday2('2021-01-02')
                                                        ->setFday3('2021-01-03')
                                                        ->setFmemo1('メモ1')
                                                        ->setFmemo2('メモ2')
                                                        ->setFmemo3('メモ3')
                                                        ->setUpcode(112)
                                                        ->setTankaKbn(2)
                                                        ->setTorikbn(0)
                                                        ->setSime(25)
                                                        ->setSite(1)
                                                        ->setInday(25)
                                                        ->setRitu(1.7)
                                                        ->setKhasuu(1)
                                                        ->setMemmail(
                                                            (new RegMember\MemMailModel())
                                                            ->setMail('regMemberSmem@AceClient.v1.0')
                                                            ->setIdx(1)
                                                            ->setDmailkbn(1)
                                                        )

                                            )
                                    );
    }


    public function testSerializeRegMember()
    {
        $regMemAdrRequestModel = $this->getRegmemberRequestModelCase3();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($regMemAdrRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] : 
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;

        $syid = OverviewMapper::ACE_TEST_SYID;
        $sessionid = $this->sessionid;
        $jmemid = $this->testJmemid;
        $nmemid = $this->testNmemid;
        $smemid = $this->testSmemid;

        $expectedData = 
        <<<XML
        {$soapHead}
            <regMember xmlns="{$xmlns}">
            <prm><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
                <member>
                <jmember>
                    <memmail>
                        <dmailkbn>1</dmailkbn>
                        <idx>1</idx>
                        <mail>regMemberJmem@AceClient.v1.0</mail>
                    </memmail>
                    <passwdrem>
                        <question>質問</question>
                        <answer>答え</answer>
                    </passwdrem>
                    <code>{$jmemid}</code>
                    <adr1>東京都</adr1>
                    <adr2>住所2</adr2>
                    <adr3>住所3</adr3>
                    <adr4>住所4</adr4>
                    <simei>RegMemberJmemTest</simei>
                    <kana>ＲｅｇＭｅｍｂｅｒＪｍｅｍＴｅｓｔ</kana>
                    <zip>110-0005</zip>
                    <tel>09876543210</tel>
                    <birthday>20210101</birthday>
                    <tel2>0999888777</tel2>
                    <upcode>112</upcode>
                    <inday>27</inday>
                    <khasuu>0</khasuu>
                    <sex>1</sex>
                    <sime>25</sime>
                    <site>1</site>
                    <code2>code2</code2>
                    <free1>フリー1</free1>
                    <free2>フリー2</free2>
                    <free3>フリー3</free3>
                    <fday1>20210101</fday1>
                    <fday2>20210102</fday2>
                    <fday3>20210103</fday3>
                    <fmemo1>メモ1</fmemo1>
                    <fmemo2>メモ2</fmemo2>
                    <fmemo3>メモ3</fmemo3>
                    <fcode1>fcode1</fcode1>
                    <fcode2>fcode2</fcode2>
                    <fcode3>fcode3</fcode3>
                    <bikou1>建物名</bikou1>
                    <bikou2>会社名</bikou2>
                    <bikou3>備考3</bikou3>
                    <baitai>100</baitai>
                    <baifile>100</baifile>
                    <fax>1234567890</fax>
                    <dmkbn>1</dmkbn>
                    <ritu>1.2</ritu>
                    <tankakbn>1</tankakbn>
                    <torikbn>1</torikbn>
                    <taikai>0</taikai>
                    <passwd>password</passwd>
                    <icode>112</icode>
                    <userid>111</userid>
                    <mobileId>09012345678</mobileId>
                    <point>1000</point>
                    <pointkind>1</pointkind>
                </jmember>
                <nmember>
                    <eda></eda>
                    <code>{$nmemid}</code>
                    <adr1>東京都</adr1>
                    <adr2>住所2</adr2>
                    <adr3>住所3</adr3>
                    <adr4>住所4</adr4>
                    <simei>RegMemberNmemTest</simei>
                    <kana>ＲｅｇＭｅｍｂｅｒＮｍｅｍＴｅｓｔ</kana>
                    <zip>110-0005</zip>
                    <tel>09876543210</tel>
                    <bikou1>備考1</bikou1>
                    <bikou2>備考2</bikou2>
                    <bikou3>備考3</bikou3>
                </nmember>
                <smember>
                    <memmail>
                        <dmailkbn>1</dmailkbn>
                        <idx>1</idx>
                        <mail>regMemberSmem@AceClient.v1.0</mail>
                    </memmail>
                    <birthday>19990909</birthday>
                    <tel2>03-5811-1866</tel2>
                    <upcode>112</upcode>
                    <inday>25</inday>
                    <khasuu>1</khasuu>
                    <sex>2</sex>
                    <sime>25</sime>
                    <site>1</site>
                    <code2>123</code2>
                    <free1>フリー1</free1>
                    <free2>フリー2</free2>
                    <free3>フリー3</free3>
                    <fday1>20210101</fday1>
                    <fday2>20210102</fday2>
                    <fday3>20210103</fday3>
                    <fmemo1>メモ1</fmemo1>
                    <fmemo2>メモ2</fmemo2>
                    <fmemo3>メモ3</fmemo3>
                    <fcode1>fcode1</fcode1>
                    <fcode2>fcode2</fcode2>
                    <fcode3>fcode3</fcode3>
                    <bikou1>FKビル5階</bikou1>
                    <bikou2>エー・アール・システム株式会社</bikou2>
                    <bikou3>備考3</bikou3>
                    <baitai>100</baitai>
                    <baifile>100</baifile>
                    <fax>03-5811-1865</fax>
                    <dmkbn>1</dmkbn>
                    <ritu>1.7</ritu>
                    <tankakbn>2</tankakbn>
                    <torikbn>0</torikbn>
                    <code>{$smemid}</code>
                    <adr1>東京都</adr1>
                    <adr2>千代田</adr2>
                    <adr3>区岩本町</adr3>
                    <adr4>１丁目９−５</adr4>
                    <simei>RegMemberSmemTest</simei>
                    <kana>ＲｅｇＭｅｍｂｅｒＳｍｍｅｍＴｅｓｔ</kana>
                    <zip>101-0032</zip>
                    <tel>03-5811-1864</tel>
                </smember>
                </member>
                ]]></prm>
                <id>{$syid}</id>
                <sessid>{$sessionid}</sessid>
            </regMember>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData)); 
    }

    public function testRequestRegMemberCase3()
    {
        try {
            $regMemberRequest = $this->getRegmemberRequestModelCase3();
            $response = $this->aceClient->makeMemberService()
                                       ->makeRegMemberMethod()
                                       ->withRequest($regMemberRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $jmember = $responseObj->getMember()->getJmember() ?? null;
                $smember = $responseObj->getMember()->getSmember() ?? null;
                $nmember = $responseObj->getMember()->getNmember() ?? null;
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEmpty($message1);
        $this->assertEmpty($message2);

        $this->assertEquals($this->testJmemid, $jmember->getCode());
        $this->assertEquals('RegMemberJmemTest', $jmember->getSimei());
        $this->assertEquals('ＲｅｇＭｅｍｂｅｒＪｍｅｍＴｅｓｔ', $jmember->getKana());
        $this->assertEquals('1', $jmember->getDmkbn());
        $this->assertEquals('110-0005', $jmember->getZip());
        $this->assertEquals('東京都', $jmember->getAdr1());
        $this->assertEquals('住所2', $jmember->getAdr2());
        $this->assertEquals('住所3', $jmember->getAdr3());
        $this->assertEquals('住所4', $jmember->getAdr4());
        $this->assertEquals('09876543210', $jmember->getTel());
        $this->assertEquals('1234567890', $jmember->getFax());
        $this->assertEquals('0999888777', $jmember->getTel2());
        $this->assertEquals('13106', $jmember->getArea());
        $this->assertEquals('', $jmember->getCbar());
        $this->assertEquals('0', $jmember->getDadr());
        $this->assertEquals('0', $jmember->getGadr());
        $this->assertEquals('', $jmember->getCode2());
        $this->assertEquals('1', $jmember->getTankakbn());
        $this->assertEquals('1', $jmember->getSex());
        $this->assertEquals('20210101', $jmember->getBirthday()->toApiDateTime());
        $this->assertEquals('', $jmember->getAge());
        $this->assertEquals('0', $jmember->getBlkbn());
        $this->assertNull($jmember->getBlday());
        $this->assertEquals('100', $jmember->getBaitai());
        $this->assertEquals('媒体１００番', $jmember->getBaitaiName());
        $this->assertEquals('100', $jmember->getBaifile());
        $this->assertEquals('媒体管理１００番', $jmember->getBaifileName());
        $this->assertEquals('', $jmember->getFree1());
        $this->assertEquals('', $jmember->getFree2());
        $this->assertEquals('', $jmember->getFree3());
        $this->assertEquals('', $jmember->getFday1());
        $this->assertEquals('', $jmember->getFday2());
        $this->assertEquals('', $jmember->getFday3());
        $this->assertEquals('', $jmember->getFmemo1());
        $this->assertEquals('', $jmember->getFmemo2());
        $this->assertEquals('', $jmember->getFmemo3());
        $this->assertEquals('fcode1', $jmember->getFcode1());
        $this->assertEquals('fcode2', $jmember->getFcode2());
        $this->assertEquals('FCODE3', $jmember->getFcode3());
        $this->assertEquals('', $jmember->getFname1());
        $this->assertEquals('', $jmember->getFname2());
        $this->assertEquals('', $jmember->getFname3());
        $this->assertEquals('112', $jmember->getUpcode());
        $this->assertEquals('AddCartTest', $jmember->getUpcodeSimei());
        $this->assertEquals('regMemberJmem@AceClient.v1.0', $jmember->getMail());
        $this->assertEquals('建物名', $jmember->getBikou1());
        $this->assertEquals('会社名', $jmember->getBikou2());
        $this->assertEquals('', $jmember->getBikou3());
        $this->assertEquals('regMemberJmem@AceClient.v1.0', $jmember->getMail1());
        $this->assertEquals('1', $jmember->getPckbn1());
        $this->assertEquals('0', $jmember->getKeikbn1());
        $this->assertEquals('1', $jmember->getMelmaga1());
        $this->assertEquals('', $jmember->getMail2());
        $this->assertEquals('', $jmember->getPckbn2());
        $this->assertEquals('', $jmember->getKeikbn2());
        $this->assertEquals('', $jmember->getMelmaga2());
        $this->assertEquals('', $jmember->getMail3());
        $this->assertEquals('', $jmember->getPckbn3());
        $this->assertEquals('', $jmember->getKeikbn3());
        $this->assertEquals('', $jmember->getMelmaga3());
        $this->assertEquals('', $jmember->getMail4());
        $this->assertEquals('', $jmember->getPckbn4());
        $this->assertEquals('', $jmember->getKeikbn4());
        $this->assertEquals('', $jmember->getMelmaga4());
        $this->assertEquals('', $jmember->getMail5());
        $this->assertEquals('', $jmember->getPckbn5());
        $this->assertEquals('', $jmember->getKeikbn5());
        $this->assertEquals('', $jmember->getMelmaga5());
        $this->assertEquals('111', $jmember->getUserid());
        $this->assertEquals('0', $jmember->getTaikai());
        $this->assertEquals('1', $jmember->getTorikbn());
        $this->assertEquals('25', $jmember->getSime());
        $this->assertEquals('1', $jmember->getSite());
        $this->assertEquals('27', $jmember->getInday());
        $this->assertEquals('112', $jmember->getIcode());
        $this->assertEquals('1.2', $jmember->getRitu());
        $this->assertEquals('0', $jmember->getKhasuu());

        $this->assertEquals($this->testNmemid, $nmember->getCode());
        $this->assertNotNull($nmember->getEda());
        $this->assertEquals('2', $nmember->getBetu());
        $this->assertEquals('RegMemberNmemTest', $nmember->getAdrname());
        $this->assertEquals('110-0005', $nmember->getZip());
        $this->assertEquals('東京都', $nmember->getAdr1());
        $this->assertEquals('住所2', $nmember->getAdr2());
        $this->assertEquals('住所3', $nmember->getAdr3());
        $this->assertEquals('住所4', $nmember->getAdr4());
        $this->assertEquals('09876543210', $nmember->getTel());
        $this->assertEquals('13106', $nmember->getArea());
        $this->assertEquals('', $nmember->getCbar());
        $this->assertEquals('ＲｅｇＭｅｍｂｅｒＮｍｅｍＴｅｓｔ', $nmember->getAdrbikou1());
        $this->assertEquals('', $nmember->getAdrbikou2());
        $this->assertEquals('', $nmember->getAdrbikou3());

        $this->assertEquals($this->testSmemid, $smember->getCode());
        $this->assertEquals('RegMemberSmemTest', $smember->getSimei());
        $this->assertEquals('ＲｅｇＭｅｍｂｅｒＳｍｍｅｍＴｅｓｔ', $smember->getKana());
        $this->assertEquals('1', $smember->getDmkbn());
        $this->assertEquals('101-0032', $smember->getZip());
        $this->assertEquals('東京都', $smember->getAdr1());
        $this->assertEquals('千代田', $smember->getAdr2());
        $this->assertEquals('区岩本町', $smember->getAdr3());
        $this->assertEquals('１丁目９−５', $smember->getAdr4());
        $this->assertEquals('0358111864', $smember->getTel());
        $this->assertEquals('', $smember->getFax());
        $this->assertEquals('0358111866', $smember->getTel2());
        $this->assertEquals('13101', $smember->getArea());
        $this->assertEquals('', $smember->getCbar());
        $this->assertEquals('0', $smember->getDadr());
        $this->assertEquals('0', $smember->getGadr());
        $this->assertEquals('', $smember->getCode2());
        $this->assertEquals('2', $smember->getTankakbn());
        $this->assertEquals('2', $smember->getSex());
        $this->assertEquals('19990909', $smember->getBirthday()->toApiDateTime());
        $this->assertEquals('', $smember->getAge());
        $this->assertEquals('0', $smember->getBlkbn());
        $this->assertNull($smember->getBlday());
        $this->assertEquals('100', $smember->getBaitai());
        $this->assertEquals('媒体１００番', $smember->getBaitaiName());
        $this->assertEquals('100', $smember->getBaifile());
        $this->assertEquals('媒体管理１００番', $smember->getBaifileName());
        $this->assertEquals('', $smember->getFree1());
        $this->assertEquals('', $smember->getFree2());
        $this->assertEquals('', $smember->getFree3());
        $this->assertEquals('', $smember->getFday1());
        $this->assertEquals('', $smember->getFday2());
        $this->assertEquals('', $smember->getFday3());
        $this->assertEquals('', $smember->getFmemo1());
        $this->assertEquals('', $smember->getFmemo2());
        $this->assertEquals('', $smember->getFmemo3());
        $this->assertEquals('', $smember->getFcode1());
        $this->assertEquals('', $smember->getFcode2());
        $this->assertEquals('', $smember->getFcode3());
        $this->assertEquals('', $smember->getFname1());
        $this->assertEquals('', $smember->getFname2());
        $this->assertEquals('', $smember->getFname3());
        $this->assertEquals('112', $smember->getUpcode());
        $this->assertEquals('AddCartTest', $smember->getUpcodeSimei());
        $this->assertEquals('regMemberSmem@AceClient.v1.0', $smember->getMail());
        $this->assertEquals('FKビル5階', $smember->getBikou1());
        $this->assertEquals('エー・アール・システム株式会社', $smember->getBikou2());
        $this->assertEquals('', $smember->getBikou3());
        $this->assertEquals('regMemberSmem1@AceClient.v1.0', $smember->getMail1());
        $this->assertEquals('1', $smember->getPckbn1());
        $this->assertEquals('0', $smember->getKeikbn1());
        $this->assertEquals('1', $smember->getMelmaga1());
        $this->assertEquals('regMemberSmem@AceClient.v1.0', $smember->getMail2());
        $this->assertEquals('1', $smember->getPckbn2());
        $this->assertEquals('0', $smember->getKeikbn2());
        $this->assertEquals('1', $smember->getMelmaga2());
        $this->assertEquals('', $smember->getMail3());
        $this->assertEquals('', $smember->getPckbn3());
        $this->assertEquals('', $smember->getKeikbn3());
        $this->assertEquals('', $smember->getMelmaga3());
        $this->assertEquals('', $smember->getMail4());
        $this->assertEquals('', $smember->getPckbn4());
        $this->assertEquals('', $smember->getKeikbn4());
        $this->assertEquals('', $smember->getMelmaga4());
        $this->assertEquals('', $smember->getMail5());
        $this->assertEquals('', $smember->getPckbn5());
        $this->assertEquals('', $smember->getKeikbn5());
        $this->assertEquals('', $smember->getMelmaga5());
        $this->assertEquals('', $smember->getUserid());
        $this->assertEquals('0', $smember->getTaikai());
        $this->assertEquals('0', $smember->getTorikbn());
        $this->assertEquals('25', $smember->getSime());
        $this->assertEquals('1', $smember->getSite());
        $this->assertEquals('25', $smember->getInday());
        $this->assertEquals('116', $smember->getIcode());
        $this->assertEquals('1.7', $smember->getRitu());
        $this->assertEquals('1', $smember->getKhasuu());


    }

}