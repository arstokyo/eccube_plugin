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

namespace Plugin\AceClient43\Bridge;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\CheckMailAdress\CheckMailAdressRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMember\GetMemberRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode\GetMemberMcodeRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr as RequestRegMemAdr;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember\GetMemberResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode\GetMemberMcodeResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMember\RegMemberResponseModelInterface;
use Plugin\AceClient43\AceServices\Service\MemberService;
use Plugin\AceClient43\Entity\CustomerAddressTrait;
use Plugin\AceClient43\Entity\CustomerTrait;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnGetAndUpdateCustomerEvent;
use Plugin\AceClient43\Events\PostCreateOrUpdateCustomerAddressEvent;
use Plugin\AceClient43\Events\PostRegisterCustomerEvent;
use Plugin\AceClient43\Events\PreCreateOrUpdateCustomerAddressEvent;
use Plugin\AceClient43\Events\PreRegisterCustomerEvent;
use Plugin\AceClient43\Exception\CouldNotCheckCustomerExistingException;
use Plugin\AceClient43\Exception\CouldNotCreateOrUpdateCustomerAddressException;
use Plugin\AceClient43\Exception\CouldNotRegisterNewCustomerException;

/**
 * 顧客連携ブリッジクラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerBridge extends BaseBridge
{
    /**
     * @var MemberService
     */
    private MemberService $memberService;

    public function __construct(
        MemberService $memberService,
    ) {
        $this->memberService = $memberService;
    }

    /**
     * 顧客データをRegMemberモデルにバインドする
     *
     * @param CustomerTrait|Customer $customer
     *
     * @return RegMember\RegMemberRequestModelInterface
     *
     * @throws \LogicException
     */
    private function bindCustomerToRegMember($customer): RegMember\RegMemberRequestModelInterface
    {
        $syid = $this->getSyid();
        $jmember = (new RegMember\JmemberModel())
            ->setSimei(mb_convert_kana(sprintf('%s %s', $customer->getname01(), $customer->getName02(), 'KVA')))
            ->setKana(mb_convert_kana(sprintf('%s %s', $customer->getKana01(), $customer->getKana02(), 'KVA')))
            ->setZip($customer->getPostalCode())
            ->setAdr1($customer->getPref()->getName())
            ->setAdr2($customer->getAddr01())
            ->setAdr3($customer->getAddr02())
            ->setTel($customer->getPhoneNumber())
            ->setUserid($customer->getEmail())
            ->setSexByClass($customer->getSex())
            ->setBirthday($customer->getBirth())
            ->setPoint((int) $customer->getPoint() ?? 0)
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
            ->setSessId($this->session->getId());
    }

    /**
     * 顧客データをACE APIに送信
     *
     * @param RegMember\RegMemberRequestModelInterface $regMemberRequest
     * @param CustomerTrait|Customer $customer
     * @param string $eventName
     * @param bool $needFlush
     * @param array $options
     *
     * @throws CouldNotRegisterNewCustomerException
     */
    private function sendCustomerToAce(RegMember\RegMemberRequestModelInterface $regMemberRequest, Customer $customer, string $eventName, bool $needFlush, array $options): void
    {
        $this->eventDispatcher->dispatch(
            new PreRegisterCustomerEvent($regMemberRequest, $customer, $options),
            $eventName
        );

        try {
            $response = $this->memberService->makeRegMemberMethod()
                ->withRequest($regMemberRequest)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('通販Aceの顧客処理に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var RegMemberResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();

            if ($this->hasErrorMessage($responseObject->getMember())) {
                throw new CouldNotRegisterNewCustomerException();
            }

            $customer->setAceCustomerId($responseObject->getMember()->getJmember()->getCode());

            $postEventName = $eventName === Events::PRE_REGISTER_CUSTOMER
                ? Events::POST_REGISTER_CUSTOMER
                : Events::POST_UPDATE_CUSTOMER;

            $this->eventDispatcher->dispatch(
                new PostRegisterCustomerEvent($responseObject, $customer, $options),
                $postEventName
            );

            $this->em->persist($customer);

            if ($needFlush) {
                $this->em->flush($customer);
            }
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotRegisterNewCustomerException) {
                $this->logger->error('通販Aceの顧客処理に失敗しました', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの顧客処理に失敗しました', ['exception' => $e]);
            throw new CouldNotRegisterNewCustomerException('通販Aceの顧客処理時にエラーが発生しました', $e);
        }
    }

    /**
     * 顧客を新規登録
     *
     * @param CustomerTrait|Customer $customer
     * @param bool $needFlush - trueの場合、エンティティマネージャーをフラッシュします
     * @param array $options
     *
     * @throws \LogicException
     */
    public function new(Customer $customer, bool $needFlush = false, array $options = []): void
    {
        if (null !== $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの顧客登録に失敗しました: 顧客IDが既に存在します', ['customer' => $customer]);
            throw new \LogicException('顧客IDが既に登録されています。');
        }

        $regMemberRequest = $this->bindCustomerToRegMember($customer);

        $this->sendCustomerToAce($regMemberRequest, $customer, Events::PRE_REGISTER_CUSTOMER, $needFlush, $options);
    }

    /**
     * 顧客情報を更新
     *
     * @param CustomerTrait|Customer $customer
     * @param bool $needFlush - trueの場合、エンティティマネージャーをフラッシュします
     * @param array $options
     *
     * @throws \LogicException
     */
    public function update(Customer $customer, bool $needFlush = true, array $options = []): void
    {
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの顧客更新に失敗しました: 顧客IDが設定されていません', ['customer' => $customer]);
            throw new \LogicException('顧客IDが設定されていません。');
        }

        $regMemberRequest = $this->bindCustomerToRegMember($customer);

        $this->sendCustomerToAce($regMemberRequest, $customer, Events::PRE_UPDATE_CUSTOMER, $needFlush, $options);
    }

    /**
     * 会員IDによる顧客情報の取得
     *
     * @param string $ace_mbid
     *
     * @return GetMemberMcode\LoginMemberModelInterface|null
     */
    public function getByMbid(string $ace_mbid): ?GetMemberMcode\LoginMemberModelInterface
    {
        $request = (new GetMemberMcodeRequestModel())
            ->setId($this->getSyid())
            ->setMcode($ace_mbid);

        try {
            $response = $this->memberService->makeGetMemberMcodeMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('通販Aceの顧客情報取得に失敗しました。');
            }

            /** @var GetMemberMcodeResponseModelInterface $responseModel */
            $responseModel = $response->getResponse();

            return $responseModel->getLoginMember()->getMember()->getCode() ? $responseModel->getLoginMember() : null;
        } catch (\Throwable $e) {
            $this->logger->error('通販Aceの顧客情報取得に失敗しました', ['exception' => $e]);
        }

        return null;
    }

    /**
     * メールアドレスとパスワードによる顧客情報の取得
     *
     * @param string $email - 顧客のメールアドレス
     * @param string $password - 顧客のパスワード
     *
     * @return GetMember\LoginMemberModelInterface|null
     */
    public function getByEmailAndPassword(string $email, string $password): ?GetMember\LoginMemberModelInterface
    {
        $request = (new GetMemberRequestModel())
            ->setId($this->getSyid())
            ->setUserid($email)
            ->setPasswd($password);

        try {
            $response = $this->memberService->makeGetMemberMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                $this->logger->error('通販Aceの顧客情報取得に失敗しました: ステータスコード '.$response->getStatusCode());

                return null;
            }

            /** @var GetMemberResponseModelInterface $responseModel */
            $responseModel = $response->getResponse();

            return $responseModel->getLoginMember()->getMember()->getCode() ? $responseModel->getLoginMember() : null;
        } catch (\Throwable $e) {
            $this->logger->error('通販Aceの顧客情報取得に失敗しました', ['exception' => $e]);
        }

        return null;
    }

    /**
     * 顧客情報を取得し更新する
     *
     * @param CustomerTrait|Customer $customer
     * @param bool $needFlush
     *
     * @return Customer
     *
     * @throws \LogicException
     */
    public function getAndUpdate(Customer $customer, bool $needFlush = true): Customer
    {
        if (null === $aceMbid = $customer->getAceCustomerId()) {
            $loginMemberModel = $this->getByEmailAndPassword($customer->getEmail(), $customer->getPassword());
        } else {
            $loginMemberModel = $this->getByMbid($aceMbid);
        }

        if (null === $loginMemberModel) {
            return $customer;
        }

        $jmember = $loginMemberModel->getMember();

        // TODO: 今後直す予定
        // 氏名を姓と名に分割
        $names = explode(' ', $jmember->getSimei());
        $customer->setName01($names[0] ?? '');
        $customer->setName02($names[1] ?? '');

        // フリガナを姓と名に分割
        $kanas = explode(' ', $jmember->getKana());
        $customer->setKana01($kanas[0] ?? '');
        $customer->setKana02($kanas[1] ?? '');

        $customer->setPostalCode($jmember->getZip());
        $customer->setAddr01($jmember->getAdr2());
        $customer->setAddr02($jmember->getAdr3());
        $customer->setPhoneNumber($jmember->getTel());
        $customer->setEmail($jmember->getUserid());
        $customer->setSex($jmember->getSex());
        $customer->setBirth($jmember->getBirthday());
        $customer->setPoint($jmember->getPoint());
        $customer->setAceCustomerId($jmember->getCode());

        $this->eventDispatcher->dispatch(
            new OnGetAndUpdateCustomerEvent($loginMemberModel, $customer),
            Events::ON_GET_AND_UPDATE_CUSTOMER
        );

        $this->em->persist($customer);
        if ($needFlush) {
            $this->em->flush();
        }

        return $customer;
    }

    /**
     * 顧客の新規住所を作成
     *
     * @param CustomerAddress[]|CustomerAddressTrait[] $addresses
     * @param bool $needFlush
     * @param array $options
     *
     * @throws \LogicException
     */
    public function createOrUpdateAddresses(array $addresses, bool $needFlush = true, array $options = []): bool
    {
        if (empty($addresses)) {
            return false;
        }

        foreach ($addresses as $address) {
            $this->createOrUpdateAddress($address, false, $options);
        }

        if ($needFlush) {
            $this->em->flush();
        }

        return true;
    }

    /**
     * 顧客の住所を新規作成または更新
     *
     * @param CustomerAddress|CustomerAddressTrait $address
     * @param mixed $needFlush
     * @param array $options
     *
     * @return bool
     *
     * @throws \LogicException
     * @throws CouldNotCreateOrUpdateCustomerAddressException
     */
    public function createOrUpdateAddress(CustomerAddress $address, bool $needFlush = true, array $options = []): bool
    {
        /**
         * @var CustomerTrait|Customer $customer
         */
        $customer = $address->getCustomer();
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの住所登録に失敗しました: 顧客IDが設定されていません', ['customer' => $customer]);
            throw new \LogicException('先に顧客を登録してください。');
        }

        $request = (new RegMemAdrRequestModel())
            ->setId($this->getSyid())
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

        $this->eventDispatcher->dispatch(
            new PreCreateOrUpdateCustomerAddressEvent($request, $address, $options),
            Events::PRE_CREATE_OR_UPDATE_CUSTOMER_ADDRESS
        );

        try {
            $response = $this->memberService->makeRegMemAdrMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('通販Aceの住所登録に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var RegMemAdrResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getMember())) {
                throw new CouldNotCreateOrUpdateCustomerAddressException('通販Aceの住所登録に失敗しました。');
            }

            $address->setAceEdaNo($responseObject->getMember()->getNmember()->getEda());

            $this->eventDispatcher->dispatch(
                new PostCreateOrUpdateCustomerAddressEvent($responseObject, $address, $options),
                Events::POST_CREATE_OR_UPDATE_CUSTOMER_ADDRESS
            );

            $this->em->persist($address);
            if ($needFlush) {
                $this->em->flush($address);
            }
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotCreateOrUpdateCustomerAddressException) {
                $this->logger->error('通販Aceの住所登録に失敗しました', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの住所登録に失敗しました', ['exception' => $e]);
            throw new CouldNotCreateOrUpdateCustomerAddressException('通販Aceの住所登録時にエラーが発生しました', $e);
        }

        return true;
    }

    /**
     * 顧客の存在チェック
     *
     * @throw CouldNotCheckCustomerExistingException
     */
    public function has(string $mail): bool
    {
        try {
            $request = (new CheckMailAdressRequestModel())
                ->setId($this->getSyid())
                ->setMailadress($mail);

            $response = $this->memberService->makeCheckMailAdressMethod()
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('通販Aceの顧客の参照時に、エラーが発生しました。 %s', $response->getStatusCode()));
            }

            /** @var CheckMailAdressResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();

            return 'NG' === $responseObject->getMember()->getMessage()->getResult();
        } catch (\Throwable $e) {
            $this->logger->error('通販Aceの顧客存在のチェック処理にエラーが発生しました。', ['exception' => $e]);
            throw new CouldNotCheckCustomerExistingException('通販Aceの顧客が存在するかどうかのチェックできませんでした。', $e);
        }
    }
}
