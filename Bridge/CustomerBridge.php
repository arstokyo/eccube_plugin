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
use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\AceMethod\Member\RegMemberMethod;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMember\RegMemberResponseModelInterface;
use Plugin\AceClient43\Bridge\Helper\CustomerBridgeHelper;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\OnGetAndUpdateCustomerEvent;
use Plugin\AceClient43\Events\PostRegisterCustomerEvent;
use Plugin\AceClient43\Events\PreRegisterCustomerEvent;
use Plugin\AceClient43\Exception\CouldNotCheckCustomerExistingException;
use Plugin\AceClient43\Exception\CouldNotRegisterNewCustomerException;

/**
 * 顧客連携ブリッジクラス
 */
class CustomerBridge extends BaseBridge
{
    private CustomerBridgeHelper $helper;

    private RegMemberMethod $regMemberMethod;

    public function __construct(
        RegMemberMethod $regMemberMethod,
        CustomerBridgeHelper $helper,
    ) {
        $this->helper = $helper;
        $this->regMemberMethod = $regMemberMethod;
    }

    /**
     * 顧客を新規登録
     *
     * @param Customer $customer
     * @param bool $needFlush - trueの場合、エンティティマネージャーをフラッシュします
     * @param array $options
     *
     * @throws CouldNotRegisterNewCustomerException
     */
    public function new(Customer $customer, bool $needFlush = false, array $options = []): void
    {
        if (null !== $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの顧客登録に失敗しました: 顧客IDが既に存在します', ['customer' => $customer]);
            throw new \LogicException('顧客IDが既に登録されています。');
        }

        $regMemberRequest = $this->helper->bindCustomerToRegMember($customer, $this->getSyid(), $options);
        $this->sendCustomerToAce($regMemberRequest, $customer, Events::PRE_REGISTER_CUSTOMER, $needFlush, $options);
    }

    /**
     * 顧客情報を更新
     *
     * @param Customer $customer
     * @param bool $needFlush - trueの場合、エンティティマネージャーをフラッシュします
     * @param array $options
     *
     * @throws CouldNotRegisterNewCustomerException
     */
    public function update(Customer $customer, bool $needFlush = true, array $options = []): void
    {
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの顧客更新に失敗しました: 顧客IDが設定されていません', ['customer' => $customer]);
            throw new \LogicException('顧客IDが設定されていません。');
        }

        $regMemberRequest = $this->helper->bindCustomerToRegMember($customer, $this->getSyid(), $options);
        $this->sendCustomerToAce($regMemberRequest, $customer, Events::PRE_UPDATE_CUSTOMER, $needFlush, $options);
    }

    /**
     * 顧客データをACE APIに送信
     *
     * @param RegMember\RegMemberRequestModelInterface $regMemberRequest
     * @param Customer $customer
     * @param string $eventName
     * @param bool $needFlush
     * @param array $options
     *
     * @throws CouldNotRegisterNewCustomerException
     */
    private function sendCustomerToAce($regMemberRequest, Customer $customer, string $eventName, bool $needFlush, array $options): void
    {
        if ($this->eventDispatcher->hasListeners($eventName)) {
            $this->eventDispatcher->dispatch(
                new PreRegisterCustomerEvent($regMemberRequest, $customer, $options),
                $eventName
            );
        }

        try {
            $response = $this->regMemberMethod
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

            if ($this->eventDispatcher->hasListeners($postEventName)) {
                $this->eventDispatcher->dispatch(
                    new PostRegisterCustomerEvent($responseObject, $customer, $options),
                    $postEventName
                );
            }

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
    public function getByAceCustomerId(string $aceCustomerId): ?GetMemberMcode\LoginMemberModelInterface
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
    public function getByEmailAndPassword(string $email, string $password): ?GetMember\LoginMemberModelInterface
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
     * @param Customer $customer 更新する顧客エンティティ
     * @param bool $needFlush エンティティマネージャーの変更をフラッシュするかどうか
     *
     * @return Customer 更新された顧客エンティティ
     *
     * @throws ORMException
     */
    public function getAndUpdateEntity(Customer $customer, bool $needFlush = true, array $options = []): Customer
    {
        $loginMemberModel = null;

        if (null === $aceCustomerId = $customer->getAceCustomerId()) {
            $loginMemberModel = $this->getByEmailAndPassword($customer->getEmail(), $customer->getPassword());
        } else {
            $loginMemberModel = $this->getByAceCustomerId($aceCustomerId);
        }

        return $this->updateCustomerEntityFromLoginMember($customer, $loginMemberModel, $needFlush, $options);
    }

    /**
     * メールアドレスとパスワードで顧客情報を取得し作成する
     *
     * @param string $email 顧客のメールアドレス
     * @param string|null $password 顧客のパスワード（省略可能）
     * @param bool $needFlush 更新後にエンティティマネージャーをフラッシュするかどうか
     *
     * @return Customer|null 作成された顧客エンティティ、または顧客が見つからない場合はnull
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
     * @param string $aceCustomerId 通販AceシステムのACE顧客ID
     * @param bool $needFlush 更新後にエンティティマネージャーをフラッシュするかどうか
     *
     * @return Customer|null 作成された顧客エンティティ、または顧客が見つからない場合はnull
     */
    public function getAndCreateCustomerByAceCustomerId(string $aceCustomerId, bool $needFlush = false, array $options = []): ?Customer
    {
        $loginMemberModel = $this->getByAceCustomerId($aceCustomerId);
        if (null === $loginMemberModel) {
            return null;
        }

        return $this->updateCustomerEntityFromLoginMember(new Customer(), $loginMemberModel, $needFlush, $options);
    }

    /**
     * ログインメンバーモデルから顧客エンティティを更新する
     *
     * @param Customer $customer 更新対象の顧客エンティティ
     * @param GetMember\LoginMemberModelInterface|GetMemberMcode\LoginMemberModelInterface|null $loginMemberModel 通販Aceから取得したログインメンバーモデル
     * @param bool $needFlush 更新後にエンティティマネージャーの変更をフラッシュするかどうか
     *
     * @return Customer 更新された顧客エンティティ
     */
    private function updateCustomerEntityFromLoginMember(Customer $customer, $loginMemberModel, bool $needFlush = true, array $options = []): Customer
    {
        // ヘルパーを使用して顧客エンティティを更新
        $customer = $this->helper->updateCustomerFromLoginMember($customer, $loginMemberModel, $options);

        if ($loginMemberModel !== null) {
            // イベント発火
            if ($this->eventDispatcher->hasListeners(Events::ON_GET_AND_UPDATE_CUSTOMER)) {
                $this->eventDispatcher->dispatch(
                    new OnGetAndUpdateCustomerEvent($loginMemberModel, $customer),
                    Events::ON_GET_AND_UPDATE_CUSTOMER
                );
            }

            // 永続化
            $this->em->persist($customer);
            if ($needFlush) {
                $this->em->flush($customer);
            }
        }

        return $customer;
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

    /**
     * 顧客の新規登録または更新を行う
     *
     * @param Customer $customer 更新または新規登録する顧客エンティティ
     * @param array $options オプションパラメータ
     * @param bool $needFlush エンティティマネージャーの変更をフラッシュするかどうか
     *
     * @throws CouldNotRegisterNewCustomerException
     */
    public function createOrUpdate(Customer $customer, bool $needFlush = true, array $options = []): void
    {
        if ($customer->getAceCustomerId()) {
            $this->update($customer, $needFlush, $options);
        } else {
            $this->new($customer, $needFlush, $options);
        }
    }
}
