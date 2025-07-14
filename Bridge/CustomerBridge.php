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
        $this->eventDispatcher->dispatch(
            new PreRegisterCustomerEvent($regMemberRequest, $customer, $options),
            $eventName
        );

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
     * @param Customer $customer
     * @param bool $needFlush - trueの場合、エンティティマネージャーをフラッシュします
     * @param array $options
     *
     * @return Customer
     */
    public function getAndUpdateCustomer(Customer $customer, bool $needFlush = true, array $options = []): Customer
    {
        $aceCustomerId = $customer->getAceCustomerId();
        if (null === $aceCustomerId) {
            return $customer;
        }

        $aceCustomer = $this->getByAceCustomerId($aceCustomerId);
        if (null === $aceCustomer) {
            return $customer;
        }

        $updatedCustomer = $this->helper->updateCustomerFromLoginMember($customer, $aceCustomer, $options);

        $this->eventDispatcher->dispatch(
            new OnGetAndUpdateCustomerEvent($aceCustomer, $updatedCustomer, $options),
            Events::ON_GET_AND_UPDATE_CUSTOMER
        );

        $this->em->persist($updatedCustomer);
        if ($needFlush) {
            $this->em->flush($updatedCustomer);
        }

        return $updatedCustomer;
    }

    /**
     * メールアドレスからACE顧客IDを取得
     *
     * @param string $email - 顧客のメールアドレス
     *
     * @return string|null
     */
    public function getAceCustomerIdByEmail(string $email): ?string
    {
        return $this->helper->getAceCustomerIdByEmail($email, $this->getSyid());
    }

    /**
     * 新規顧客の作成と同時にACE顧客IDを取得
     *
     * @param Customer $customer
     * @param bool $needFlush - trueの場合、エンティティマネージャーをフラッシュします
     * @param array $options
     *
     * @return Customer
     *
     * @throws CouldNotCheckCustomerExistingException
     */
    public function createWithAceCustomerId(Customer $customer, bool $needFlush = true, array $options = []): Customer
    {
        if (null !== $customer->getAceCustomerId()) {
            return $customer;
        }

        $aceCustomerId = $this->getAceCustomerIdByEmail($customer->getEmail());
        if (null !== $aceCustomerId) {
            $customer->setAceCustomerId($aceCustomerId);
            $this->em->persist($customer);
            if ($needFlush) {
                $this->em->flush($customer);
            }
        }

        return $customer;
    }
}
