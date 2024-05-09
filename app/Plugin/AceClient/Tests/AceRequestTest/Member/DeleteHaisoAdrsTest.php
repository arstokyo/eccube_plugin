<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\MemberPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr\NmemberModel;
use Plugin\AceClient\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\Constraint\IsEmpty;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;

class DeleteHaisoAdrsRequestModelTest extends AbstractAdminWebTestCase
{
    private ?string $mcode = '105';
    private ?string $eda = '2';

    public function CallDeleteHaisoAdrsRequestModel($mcode, $eda)
    {
        $adrs = new DeleteHaisoAdrsRequestModel();
        $adrs->setId(OverviewMapper::ACE_TEST_SYID)->setMcode($mcode);

        if ($eda !== null && $eda !== 0) {
            $adrs->setEda($eda);
        } else {
            $adrs->setEda(-999);
        }
        return $adrs;
    }

    public function testCallRegMemAdrRequestModel($mcode, ?int $eda)
    {
        $memberPrm = new MemberPrmModel();
        $nmember = new NmemberModel();
        $memberPrm->setNmember($nmember->setFax('1234567890')
                                        ->setTel('09876543210')
                                        ->setZip('399-3802')
                                        ->setAdr1('長野県')
                                        ->setAdr2('住所2')
                                        ->setAdr3('住所3')
                                        ->setAdr4('住所4')
                                        ->setCode($mcode)
                                        ->setSimei('テスト')
                                        ->setKana('森野')
                                        ->setBikou1('備考1')
                                        ->setBikou2('備考2')
                                        ->setBikou3('備考3')
                                        ->setBetu(2));
        if($eda !== null && $eda !== 0) {
            $memberPrm->setNmember($nmember->setEda($eda));
        }
        return (new RegMemAdrRequestModel())->setId(OverviewMapper::ACE_TEST_SYID)->setPrm($memberPrm);
    }

    /**
     * @testdox 顧客住所作成後、顧客住所削除のリクエスト送信、返り値に作成した住所が含まれていないことを確認
     * @testWith [ 105, 0 ]
    */
    public function testRequestDeleteHaisoAdrsCase1($mcode, $eda)
    {
        try {
            $regMemAdrRequest = $this->testCallRegMemAdrRequestModel($mcode, $eda);
            $response = (new AceClient)->makeMemberService()
                                       ->makeRegMemAdrMethod()
                                       ->withRequest($regMemAdrRequest)
                                       ->send();
            if ($response->getStatusCode() === 200){
                $targetEda = $response->getResponse()->getMember()->getNmember()->getEda();

                $getDeleteHaisoAdrsRequest = $this->CallDeleteHaisoAdrsRequestModel($mcode, $targetEda);
                $response = (new AceClient)->makeMemberService()
                                        ->makeDeleteHaisoAdrsMethod()
                                        ->withRequest($getDeleteHaisoAdrsRequest)
                                        ->send();
                if ($response->getStatusCode() === 200) {
                    /** @var DeleteHaisoAdrsResponseModel $responseObj */
                    $responseObj = $response->getResponse();
                    $eda = $responseObj->getMember()
                                            ->getNmember()
                                            ->getEda();
                    $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                    $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
                }
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertNotNull($response);
        // $targetEda の枝番がレスポンスに含まれていなければテスト成功
        //$this->assertNotContains($targetEda, $eda);
        $this->assertEquals('', $message1);
        $this->assertEquals('', $message2);
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * @testdox 削除対象の顧客が存在しない場合、エラーメッセージが返却されることを確認
     * @testWith [ 105, null ]
     */
    public function testRequestDeleteHaisoAdrsCase2($mcode, $eda)
    {
        try {

            $regMemAdrRequest = $this->testCallRegMemAdrRequestModel($mcode, $eda);
            $response = (new AceClient)->makeMemberService()
                                       ->makeRegMemAdrMethod()
                                       ->withRequest($regMemAdrRequest)
                                       ->send();
            if ($response->getStatusCode() === 200){
                $targetEda = $response->getResponse()->getMember()->getNmember()->getEda();

                $getDeleteHaisoAdrsRequest = $this->CallDeleteHaisoAdrsRequestModel(-999, $targetEda);
                $response = (new AceClient)->makeMemberService()
                                        ->makeDeleteHaisoAdrsMethod()
                                        ->withRequest($getDeleteHaisoAdrsRequest)
                                        ->send();
                if ($response->getStatusCode() === 200) {
                    /** @var DeleteHaisoAdrsResponseModel $responseObj */
                    $responseObj = $response->getResponse();
                    $nmember = $responseObj->getMember()
                                            ->getNmember();
                    $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                    $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
                }
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertNull($nmember);
        $this->assertEquals('顧客住所が存在しません', $message1);
        $this->assertNotEquals('', $message2);
    }

}