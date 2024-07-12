<?php

namespace Plugin\AceClient43\Tests\AceRequestTest\Member;

use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\MemberPrmModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\NmemberModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsResponseModel;
use Plugin\AceClient43\AceServices\Model\Response;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Plugin\AceClient43\Tests\AceRequestTest\AceRequestTestAbtract;

class DeleteHaisoAdrsRequestModelTest extends AceRequestTestAbtract
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

    public function callRegMemAdrRequestModel($mcode, ?int $eda)
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
     * @testWith [ 105, 6]
    */
    public function testRequestDeleteHaisoAdrsCase1($mcode, $eda)
    {
        try {
            $regMemAdrRequest = $this->callRegMemAdrRequestModel($mcode, $eda);
            $response = $this->aceClient->makeMemberService()
                                        ->makeRegMemAdrMethod()
                                        ->withRequest($regMemAdrRequest)
                                        ->send();
            if ($response->getStatusCode() === 200){
                $targetEda = $response->getResponse()->getMember()->getNmember()->getEda();

                $getDeleteHaisoAdrsRequest = $this->CallDeleteHaisoAdrsRequestModel($mcode, $targetEda);
                $response = $this->aceClient->makeMemberService()
                                            ->makeDeleteHaisoAdrsMethod()
                                            ->withRequest($getDeleteHaisoAdrsRequest)
                                            ->send();
                if ($response->getStatusCode() === 200) {
                    /** @var DeleteHaisoAdrsResponseModel $responseObj */
                    $responseObj = $response->getResponse();
                    $nmembers = $responseObj->getMember()->getNmember();
                    $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                    $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
                }
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEmpty('', $message1);
        $this->assertEmpty('', $message2);
        $this->assertFalse($this->isEdaExist($targetEda, $nmembers));

    }

    /**
     * @param int $eda 
     * @param Response\Member\DeleteHaisoAdrs\NmemberModel[] $nmembers
     * @return bool
     */
    public function isEdaExist($eda, $nmembers)
    {
        foreach ($nmembers as $nmember) {
            if ($nmember->getEda() === $eda) {
                return true;
            }
        }
        return false;
    }

    /**
     * @testdox 削除対象の顧客が存在しない場合、エラーメッセージが返却されることを確認
     * @testWith [ 105, null ]
     */
    public function testRequestDeleteHaisoAdrsCase2($mcode, $eda)
    {
        try {
            $getDeleteHaisoAdrsRequest = $this->CallDeleteHaisoAdrsRequestModel(-999, $eda);
            $response = $this->aceClient->makeMemberService()
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