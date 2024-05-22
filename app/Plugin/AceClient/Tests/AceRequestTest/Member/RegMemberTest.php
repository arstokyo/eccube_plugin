<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember\RegMemberRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember\MemberModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember\MemberPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember\JmemberModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember\NmemberModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember\SmemberModel;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMember\RegMemberResponseModel;
use Plugin\AceClient\AceClient;
use Plugin\AceClient\AceServices\Model\Request;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\MemMailModel;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder\PassWdRemModel;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;

class RegMemberTest extends AbstractAdminWebTestCase
{
    private ?string $testMbid = '111';
    private ?string $sessionid = '1234';

    /**
     * @test
     * @param Request\RequestModelInterface $requests
     * @dataProvider dataProvider
     */
    public function testRequestRegMember($case, $requests)
    {
        try {
            $regMemberRequest = $requests;
            $response = (new AceClient)->makeMemberService()
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
        if($case == 'case1'){
            $this->assertEquals('RegMemberTest', $jmember->getSimei());
            $this->assertEquals('', $message1);
            $this->assertEquals('', $message2);
        } else if($case == 'case2') {
            $this->assertEquals('TestAdr', $nmember->getAdrName());
            $this->assertEquals('', $message1);
            $this->assertEquals('', $message2);
        } else {
            $this->markTestSkipped('skipped.');
        }
    }

    /**
     * @test
     * @return Request\RequestModelInterface
     */
    public function getRegmemberRequestModelCase1(): Request\RequestModelInterface
    {
        $memberPrm = (new Request\Member\RegMember\MemberPrmModel)
                            ->setJmember((new JmemberModel())
                            ->setCode($this->testMbid)
                            ->setKana('')
                            ->setFax('1234567890')
                            ->setTel('09876543210')
                            ->setZip('110-0005')
                            ->setAdr1('東京都')
                            ->setAdr2('住所2')
                            ->setAdr3('住所3')
                            ->setAdr4('住所4')
                            ->setBikou1('建物名')
                            ->setBikou2('会社名')
                            ->setBikou3('備考3')
                            ->setMemmail(
                                (new MemMailModel())
                                ->setMail('regMember@regMember.jp')
                            )
                            ->setUserid($this->testMbid)
                            ->setPasswd('password')
                            ->setPasswdRem(
                                (new PassWdRemModel())
                                ->setQuestion('質問')
                                ->setAnswer('答え')
                            )
                            ->setPasswdRem(
                                (new PassWdRemModel())
                                ->setQuestion('質問')
                                ->setAnswer('答え')
                            )
                        );
        $member = new MemberPrmModel();
        $prm = new MemberPrmModel();
        // $member->setMember($memberPrm);

        $RegMember = new RegMemberRequestModel();
        return $RegMember
                        ->setId(OverviewMapper::ACE_TEST_SYID)
                        ->setSessId($this->sessionid)
                        ->setPrm($member);
    }

    /**
     * @test
     * @return Request\RequestModelInterface
     */
    public function getRegmemberRequestModelCase2(): Request\RequestModelInterface
    {
        $memberPrm = (new Request\Member\RegMember\MemberPrmModel)
                            ->setJmember((new JmemberModel())
                                ->setCode($this->testMbid)
                                ->setSimei('RegMemberTest')
                                ->setKana('ＲｅｇＭｅｍｂｅｒ')
                                ->setFax('1234567890')
                                ->setTel('09876543210')
                                ->setZip('110-0005')
                                ->setAdr1('東京都')
                                ->setAdr2('住所2')
                                ->setAdr3('住所3')
                                ->setAdr4('住所4')
                                ->setBikou1('備考1')
                                ->setBikou2('備考2')
                                ->setBikou3('備考3')
                                ->setMemmail(
                                    (new MemMailModel())
                                    ->setMail('regMember@regMember.jp')
                                )
                            )
                            ->setNmember((new NmemberModel())
                                ->setCode($this->testMbid)
                                ->setEda('')
                                ->setSimei('TestAdr')
                                ->setZip('110-0005')
                                ->setAdr1('東京都')
                                ->setAdr2('住所2')
                                ->setAdr3('住所3')
                                ->setAdr4('住所4')
                                ->setTel('09876543210')
                                ->setBikou1('備考1')
                                ->setBikou2('備考2')
                                ->setBikou3('備考3')
                            );
        $member = new MemberPrmModel();
        // $member->setMember($memberPrm);
        
        $RegMember = new RegMemberRequestModel();
        return $RegMember->setId(OverviewMapper::ACE_TEST_SYID)
                         ->setSessId('test')
                         ->setPrm($member);
    }

    /**
     * @test
     * @return array
     */
    public function dataProvider(): array
    {
        return [
           "JMemberのみ" => ['case1', $this->getRegmemberRequestModelCase1()]
        //    "NMemberも登録" => ['case2', $this->getRegmemberRequestModelCase2()]
        ];
    }

}