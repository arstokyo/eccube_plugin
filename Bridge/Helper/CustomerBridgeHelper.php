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

namespace Plugin\AceClient43\Bridge\Helper;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Repository\CustomerRepository;
use Eccube\Repository\Master\PrefRepository;
use Eccube\Repository\Master\SexRepository;
use Plugin\AceClient43\AceServices\Model\Request\Member\CheckMailAdress\CheckMailAdressRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMember as GetMemberRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode as GetMemberMcodeRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr as RequestRegMemAdr;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember as GetMemberResponse;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode as GetMemberMcodeResponse;
use Plugin\AceClient43\AceServices\Service\MemberService;

/**
 * CustomerBridgeHelper - 顧客連携ブリッジの複雑なロジックをカプセル化するヘルパークラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerBridgeHelper
{
    private MemberService $memberService;
    private CustomerRepository $customerRepository;
    private SexRepository $sexRepository;
    private PrefRepository $prefRepository;

    public function __construct(
        MemberService $memberService,
        CustomerRepository $customerRepository,
        SexRepository $sexRepository,
        PrefRepository $prefRepository,
    ) {
        $this->memberService = $memberService;
        $this->customerRepository = $customerRepository;
        $this->sexRepository = $sexRepository;
        $this->prefRepository = $prefRepository;
    }

    /**
     * 顧客データをRegMemberモデルにバインドする
     *
     * @param Customer $customer
     * @param string $syid システムID
     *
     * @return RegMember\RegMemberRequestModelInterface
     */
    public function bindCustomerToRegMember(Customer $customer, string $syid): RegMember\RegMemberRequestModelInterface
    {
        $jmember = (new RegMember\JmemberModel())
            ->setSimei(mb_convert_kana(sprintf('%s　%s', $customer->getname01(), $customer->getName02(), 'KVA')))
            ->setKana(mb_convert_kana(sprintf('%s　%s', $customer->getKana01(), $customer->getKana02(), 'KVA')))
            ->setZip($customer->getPostalCode())
            ->setAdr1($customer->getPref()->getName())
            ->setAdr2($customer->getAddr01())
            ->setAdr3($customer->getAddr02())
            ->setTel($customer->getPhoneNumber())
            ->setUserid($customer->getEmail())
            ->setSexByClass($customer->getSex())
            ->setBirthday($customer->getBirth())
            ->setPoint((int) $customer->getPoint() ?? 0)
            ->setPasswd($customer->getPassword())
            ->setMemmail((new RegMember\MemMailModel())
                ->setMail($customer->getEmail())
                ->setIdx(1)
            );

        // 更新用にAceMemberIdを設定
        if ($customer->getAceCustomerId()) {
            $jmember->setCode($customer->getAceCustomerId());
        }

        return (new RegMember\RegMemberRequestModel())
            ->setId($syid)
            ->setPrm((new RegMember\MemberPrmModel())->setJmember($jmember))
            ->setSessId(session_id());
    }

    /**
     * メールアドレスとパスワードによる顧客情報の取得
     *
     * @param string $email 顧客のメールアドレス
     * @param string $password 顧客のパスワード
     * @param string $syid システムID
     *
     * @return GetMemberResponse\LoginMemberModelInterface|null
     */
    public function getByEmailAndPassword(string $email, string $password, string $syid): ?GetMemberResponse\LoginMemberModelInterface
    {
        $request = (new GetMemberRequest\GetMemberRequestModel())
            ->setId($syid)
            ->setUserid($email)
            ->setPasswd($password);

        try {
            $response = $this->memberService->makeGetMemberMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                return null;
            }

            /** @var GetMemberResponse\GetMemberResponseModelInterface $responseModel */
            $responseModel = $response->getResponse();

            return $responseModel->getLoginMember()->getMessage()->getResult() === 'OK'
                ? $responseModel->getLoginMember()
                : null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * 会員IDによる顧客情報の取得
     *
     * @param string $aceCustomerId 通販Aceの顧客ID
     * @param string $syid システムID
     *
     * @return GetMemberMcodeResponse\LoginMemberModelInterface|null
     */
    public function getByAceCustomerId(string $aceCustomerId, string $syid): ?GetMemberMcodeResponse\LoginMemberModelInterface
    {
        $request = (new GetMemberMcodeRequest\GetMemberMcodeRequestModel())
            ->setId($syid)
            ->setMcode($aceCustomerId);

        try {
            $response = $this->memberService->makeGetMemberMcodeMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                return null;
            }

            /** @var GetMemberMcodeResponse\GetMemberMcodeResponseModelInterface $responseModel */
            $responseModel = $response->getResponse();

            return $responseModel->getLoginMember()->getMember()->getCode()
                ? $responseModel->getLoginMember()
                : null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * ログインメンバーモデルから顧客エンティティを更新する
     *
     * @param Customer $customer 更新対象の顧客エンティティ
     * @param GetMemberResponse\LoginMemberModelInterface|GetMemberMcodeResponse\LoginMemberModelInterface|null $loginMemberModel ログインメンバーモデル
     *
     * @return Customer 更新された顧客エンティティ
     */
    public function updateCustomerFromLoginMember(
        Customer $customer,
        $loginMemberModel,
    ): Customer {
        if (null === $loginMemberModel) {
            return $customer;
        }

        $jmember = $loginMemberModel->getMember();

        // 基本情報の更新
        $customer->setName01($jmember->getName1())
            ->setName02($jmember->getName2())
            ->setKana01($jmember->getKana1())
            ->setKana02($jmember->getKana2())
            ->setPostalCode($jmember->getZipEccubeFormat())
            ->setAddr01($jmember->getAdr2())
            ->setAddr02($jmember->getAdr3())
            ->setPhoneNumber($jmember->getTel())
            ->setEmail($jmember->getUserid())
            ->setBirth($jmember->getBirthday()->toDateTime())
            ->setPoint($jmember->getPoint())
            ->setAceCustomerId($jmember->getCode());

        // 性別設定
        $sexFound = $this->sexRepository->find($jmember->getSex());
        $customer->setSex($sexFound);

        // 都道府県設定
        $prefFound = $this->prefRepository->findOneBy(['name' => $jmember->getAdr1()]);
        $customer->setPref($prefFound);

        return $customer;
    }

    /**
     * メールアドレスからACE顧客IDを取得し、顧客情報を作成する処理
     *
     * @param string $email メールアドレス
     * @param string $syid システムID
     *
     * @return string|null ACE顧客ID
     */
    public function getAceCustomerIdByEmail(string $email, string $syid): ?string
    {
        $responseObject = $this->checkMailAddressInAce($email, $syid);
        if ($responseObject !== null && 'NG' === $responseObject->getMember()->getMessage()->getResult()) {
            return $responseObject->getMember()->getMessage()->getCode();
        }

        return null;
    }

    /**
     * 顧客の住所を新規作成または更新するためのリクエストモデルを生成
     *
     * @param CustomerAddress $address 住所エンティティ
     * @param string $syid システムID
     *
     * @return RegMemAdrRequestModel
     */
    public function createAddressRequestModel(CustomerAddress $address, string $syid): RegMemAdrRequestModel
    {
        $customer = $address->getCustomer();

        return (new RegMemAdrRequestModel())
            ->setId($syid)
            ->setPrm((new RequestRegMemAdr\MemberPrmModel())
                ->setNmember((new RequestRegMemAdr\NmemberModel())
                    ->setCode($customer->getAceCustomerId())
                    ->setEda($address->getAceEdaNo())
                    ->setZip($address->getPostalCode())
                    ->setAdr1($address->getPref()->getName())
                    ->setAdr2($address->getAddr01())
                    ->setAdr3($address->getAddr02())
                    ->setTel($address->getPhoneNumber())
                )
            );
    }

    /**
     * 通販Aceシステムに対してメールアドレスの存在確認を行う
     *
     * @param string $email チェックするメールアドレス
     * @param string $syid システムID
     *
     * @return CheckMailAdressResponseModelInterface|null API応答オブジェクト、エラー時はnull
     */
    public function checkMailAddressInAce(string $email, string $syid): ?CheckMailAdressResponseModelInterface
    {
        try {
            $request = (new CheckMailAdressRequestModel())
                ->setId($syid)
                ->setMailadress($email);

            $response = $this->memberService->makeCheckMailAdressMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                return null;
            }

            /* @var CheckMailAdressResponseModelInterface $responseObject */
            return $response->getResponse();
        } catch (\Throwable $e) {
            return null;
        }
    }
}
