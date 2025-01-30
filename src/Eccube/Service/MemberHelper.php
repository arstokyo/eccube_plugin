<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Service;

use Eccube\Entity\Customer;
use Plugin\AceClient;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient\AceServices\Model\Request\Member\GetRireki;
use Plugin\AceClient\AceServices\Model\Request\Member\GetRirekiDetail;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMember\RegMemberResponseModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetRireki\GetRirekiResponseModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetRirekiDetail\GetRirekiDetailResponseModel;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MemberHelper
{
    private AceClient\AceClient $aceClient;
    private $session;

    /**
     * MemberHelper constructor.
     * @param AceClient\AceClient $aceClient
     */
    public function __construct(AceClient\AceClient $aceClient, SessionInterface $session)
    {
        $this->aceClient = $aceClient;
        $this->session = $session;
    }

    /**
     * 通販Aceのユーザー登録を行う
     *
     * @param Customer $Customer
     * @return array
     */
    public function createNewMemberOnAce(Customer $Customer): array
    {
        try {
            $regMemberRequest = $this->buildRegMemberRequest($Customer);
            $response = $this->aceClient
                ->makeMemberService()
                ->makeRegMemberMethod()
                ->withRequest($regMemberRequest)
                ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $jmem = $responseObj->getMember()->getJmember();
                if (!empty($jmem)) {
                    $Customer->setMemId($jmem->getCode());
                }
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }

        } catch (\Throwable $e) {
            $message1 = $e->getMessage();
        }
        return [
            'iserror' => !empty($message1) | !empty($message2),
            'message1' => $message1,
            'message2' => isset($message2) ? $message2 : null,
        ];
    }

    /**
     * 通販Aceの会員登録リクエストを作成する
     *
     * @param Customer $Customer
     * @return RegMember\RegMemberRequestModel
     */
    private function buildRegMemberRequest(Customer $Customer): RegMember\RegMemberRequestModel
    {
        $jmember = (new RegMember\JmemberModel())
            ->setSimei(mb_convert_kana($Customer->getName01() . ' ' . $Customer->getName02(), 'KVA'))
            ->setKana(mb_convert_kana($Customer->getKana01() . ' ' . $Customer->getKana02(), 'KVA'))
            ->setZip($Customer->getPostalCode())
            ->setAdr1($Customer->getPref()->getName())
            ->setAdr2($Customer->getAddr01())
            ->setAdr3($Customer->getAddr02())
            ->setTel($Customer->getPhoneNumber())
            ->setFmemo1($Customer->getNote())
            ->setUserid($Customer->getEmail())
            ->setPasswd($Customer->getPlainPassword())
            ->setSex($Customer->getSex() === null ? null : $Customer->getSex()->getId())
            ->setBirthday($Customer->getBirth() === null ? null : $Customer->getBirth())
            ->setPoint($Customer->getPoint())
            ->setBikou2($Customer->getCompanyName())
            ->setMemmail((new RegMember\MemMailModel())
                ->setMail($Customer->getEmail())
                ->setIdx(1)
            )
            ->setPoint($Customer->getPoint() === null ? 0 : $Customer->getPoint())
            ->setFmemo1($Customer->getFmemo1() === null ? null : $Customer->getFmemo1()->getSortNo())
            ->setFmemo2($Customer->getFmemo2() === null ? null : $Customer->getFmemo2()->getSortNo())
            ->setFmemo3($Customer->getFmemo3() === null ? null : $Customer->getFmemo3()->getSortNo())
            ->setFcode1($Customer->getFcode1() === null ? null : $Customer->getFcode1()->getSortNo())
            ->setFcode2($Customer->getFcode2() === null ? null : $Customer->getFcode2()->getSortNo())
            ->setFcode3($Customer->getJob()->getId())
        ;
        $prm = (new RegMember\MemberPrmModel())->setJmember($jmember);
        return (new RegMember\RegMemberRequestModel())
            ->setId(OverviewMapper::ACE_TEST_SYID)
            ->setSessId($this->session->getId())
            ->setPrm((new RegMember\MemberPrmModel())->setJmember($jmember));
    }

    /**
     * Get Rireki from Ace
     *
     * @param string $memId
     * @param int $dispRow
     * @param int $dispPage
     * @return array|null
     */
    public function getRireki($memId, $dispRow, $dispPage)
    {
        $requestModel = new GetRireki\GetRirekiRequestModel();
        $requestModel->setId(OverviewMapper::ACE_TEST_SYID);
        $requestModel->setMcode($memId);
        $requestModel->setDispRow($dispRow);
        $requestModel->setDispPage($dispPage);
        $requestModel->setSort(0);
        try {
            $response = $this->aceClient
                ->makeMemberService()
                ->makeGetRirekiMethod()
                ->withRequest($requestModel)
                ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse()->getMember()->getRireki();
                return $this->convertModelsToArray($responseObj);
            }
        } catch (\Throwable $e) {
            $message1 = $e->getMessage();
        }
        return [];
    }

    /**
     * Get Rireki Detail from Ace
     *
     * @param string $denno
     * @param string $denku
     * @param string $mcode
     * @return array|null
     */
    public function getRirekiDetail($denno, $denku, $mcode)
    {
        $requestModel = new GetRirekiDetail\GetRirekiDetailRequestModel();
        $requestModel->setId(OverviewMapper::ACE_TEST_SYID);
        $requestModel->setDenno($denno);
        $requestModel->setDenku($denku);
        $requestModel->setMcode($mcode);
        try {
            $response = $this->aceClient
                ->makeMemberService()
                ->makeGetRirekiDetailMethod()
                ->withRequest($requestModel)
                ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetRirekiDetailResponseModel $responseObj */
                $responseObj = $response->getResponse()->getMember()->getRirekiDetail();
                return $this->convertModelsToArray($responseObj);
            }
        } catch (\Throwable $e) {
            $message1 = $e->getMessage();
        }
        return [];
    }

    /**
     * Convert models to array
     *
     * @param array $models
     * @return array
     */
    private function convertModelsToArray(array $models): array
    {
        return array_map(function($model) {
            $reflectionClass = new ReflectionClass($model);
            $properties = $reflectionClass->getProperties();
            $array = [];
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $array[$property->getName()] = $property->getValue($model);
            }
            return $array;
        }, $models);
    }
}