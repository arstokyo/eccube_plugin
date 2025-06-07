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

use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMember\RegMemberResponseModelInterface;
use Plugin\AceClient43\AceServices\Service\MemberService;
use Plugin\AceClient43\Bridge\Helper\CustomerBridgeHelper;
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
    private MemberService $memberService;
    private CustomerBridgeHelper $helper;

    public function __construct(
        MemberService $memberService,
        CustomerBridgeHelper $helper,
    ) {
        $this->memberService = $memberService;
        $this->helper = $helper;
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

        $regMemberRequest = $this->helper->bindCustomerToRegMember($customer, $this->getSyid());
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

        $regMemberRequest = $this->helper->bindCustomerToRegMember($customer, $this->getSyid());
        $this->sendCustomerToAce($regMemberRequest, $customer, Events::PRE_UPDATE_CUSTOMER, $needFlush, $options);
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
    private function sendCustomerToAce($regMemberRequest, Customer $customer, string $eventName, bool $needFlush, array $options): void
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
     * 会員IDによる顧客情報の取得
     *
     * @param string $aceCustomerId - 通販Aceの顧客ID
     *
     * @return GetMemberMcode\LoginMemberModelInterface|null
     */
    public function getByAceCustomerId(string $aceCustomerId)
    {
        return $this->helper->getByAceCustomerId($aceCustomerId, $this->getSyid());
    }

    /**
     * メールアドレスとパスワードによる顧客情報の取得
     *
     * @param string $email - 顧客のメールアドレス
     * @param string $password - 顧客のパスワード
     *
     * @return GetMember\LoginMemberModelInterface|null
     */
    public function getByEmailAndPassword(string $email, string $password)
    {
        return $this->helper->getByEmailAndPassword($email, $password, $this->getSyid());
    }

    /**
     * 顧客情報を取得し更新する
     *
     * 顧客の ACE 顧客 ID が存在する場合は、その ID を使用して顧客情報を取得します。
     * 存在しない場合は、メールアドレスとパスワードを使用して取得します。
     * 取得した情報で顧客エンティティを更新します。
     *
     * @param CustomerTrait|Customer $customer 更新する顧客エンティティ
     * @param bool $needFlush エンティティマネージャーの変更をフラッシュするかどうか
     *
     * @return Customer 更新された顧客エンティティ
     *
     * @throws \LogicException 顧客情報の取得や更新に失敗した場合
     */
    public function getAndUpdateEntity(Customer $customer, bool $needFlush = true): Customer
    {
        $loginMemberModel = null;

        if (null === $aceCustomerId = $customer->getAceCustomerId()) {
            $loginMemberModel = $this->getByEmailAndPassword($customer->getEmail(), $customer->getPassword());
        } else {
            $loginMemberModel = $this->getByAceCustomerId($aceCustomerId);
        }

        return $this->updateCustomerEntityFromLoginMember($customer, $loginMemberModel, $needFlush);
    }

    /**
     * メールアドレスとパスワードで顧客情報を取得し作成する
     *
     * 指定されたメールアドレスを使用して通販Aceから顧客情報を取得し、
     * 新しい顧客エンティティを作成します。
     * パスワードがnullの場合は、メールアドレスからACE顧客IDを取得して処理します。
     *
     * @param string $email 顧客のメールアドレス
     * @param string|null $password 顧客のパスワード（省略可能）
     * @param bool $needFlush 更新後にエンティティマネージャーをフラッシュするかどうか
     *
     * @return Customer|null 作成された顧客エンティティ、または顧客が見つからない場合はnull
     *
     * @throws ORMInvalidArgumentException
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function getAndCreateCustomerByEmail(string $email, ?string $password = null, bool $needFlush = false): ?Customer
    {
        if ($password === null) {
            $aceCustomerId = $this->getAceCustomerIdByEmail($email);
            if ($aceCustomerId !== null) {
                return $this->getAndCreateCustomerByAceCustomerId($aceCustomerId, $needFlush);
            }

            return null;
        }

        $loginMemberModel = $this->getByEmailAndPassword($email, $password);
        if ($loginMemberModel === null) {
            return null;
        }

        $customer = new Customer();

        return $this->updateCustomerEntityFromLoginMember($customer, $loginMemberModel, $needFlush);
    }

    /**
     * ACE顧客IDで顧客情報を取得し作成する
     *
     * 指定されたACE顧客IDを使用して通販Aceから顧客情報を取得し、
     * 新しい顧客エンティティを作成して更新します。顧客情報が見つからない場合はnullを返します。
     *
     * @param string $aceCustomerId 通販AceシステムのACE顧客ID
     * @param bool $needFlush 更新後にエンティティマネージャーをフラッシュするかどうか
     *
     * @return Customer|null 作成された顧客エンティティ、または顧客が見つからない場合はnull
     *
     * @throws OptimisticLockException
     * @throws ORMInvalidArgumentException
     * @throws ORMException
     */
    public function getAndCreateCustomerByAceCustomerId(string $aceCustomerId, bool $needFlush = false): ?Customer
    {
        $loginMemberModel = $this->getByAceCustomerId($aceCustomerId);
        if (null === $loginMemberModel) {
            return null;
        }

        return $this->updateCustomerEntityFromLoginMember(new Customer(), $loginMemberModel, $needFlush);
    }

    /**
     * ログインメンバーモデルから顧客エンティティを更新する
     *
     * 通販Aceから取得したログインメンバーモデルの情報を使用して、顧客エンティティの
     * データを更新します。氏名やフリガナの分割、住所情報、連絡先、個人属性などを
     * 設定し、イベントをディスパッチして追加の更新処理を可能にします。
     *
     * @param Customer $customer 更新対象の顧客エンティティ
     * @param GetMember\LoginMemberModelInterface|GetMemberMcode\LoginMemberModelInterface|null $loginMemberModel 通販Aceから取得したログインメンバーモデル
     * @param bool $needFlush 更新後にエンティティマネージャーの変更をフラッシュするかどうか
     *
     * @return Customer 更新された顧客エンティティ
     *
     * @throws ORMInvalidArgumentException
     * @throws ORMException
     * @throws OptimisticLockException
     */
    private function updateCustomerEntityFromLoginMember(Customer $customer, $loginMemberModel, bool $needFlush = true): Customer
    {
        // ヘルパーを使用して顧客エンティティを更新
        $customer = $this->helper->updateCustomerFromLoginMember($customer, $loginMemberModel);

        if ($loginMemberModel !== null) {
            // イベント発火
            $this->eventDispatcher->dispatch(
                new OnGetAndUpdateCustomerEvent($loginMemberModel, $customer),
                Events::ON_GET_AND_UPDATE_CUSTOMER
            );

            // 永続化
            $this->em->persist($customer);
            if ($needFlush) {
                $this->em->flush();
            }
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

        $request = $this->helper->createAddressRequestModel($address, $this->getSyid());

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
     * 指定されたメールアドレスが通販Aceシステムに登録されているかを確認します
     *
     * @param string $mail チェックするメールアドレス
     *
     * @return bool メールアドレスが存在する場合はtrue、存在しない場合はfalse
     *
     * @throws CouldNotCheckCustomerExistingException 確認処理に失敗した場合
     */
    public function has(string $mail): bool
    {
        $responseObject = $this->helper->checkMailAddressInAce($mail, $this->getSyid());

        if ($responseObject === null) {
            throw new CouldNotCheckCustomerExistingException('通販Aceの顧客が存在するかどうかのチェックできませんでした。');
        }

        return 'NG' === $responseObject->getMember()->getMessage()->getResult();
    }

    /**
     * メールアドレスに対応する通販Ace顧客IDを取得する
     *
     * @param string $email 顧客のメールアドレス
     *
     * @return string|null 顧客ID、顧客が存在しない場合はnull
     */
    public function getAceCustomerIdByEmail(string $email): ?string
    {
        return $this->helper->getAceCustomerIdByEmail($email, $this->getSyid());
    }
}
