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
use Plugin\AceClient43\AceServices\AceMethod\Member\DeleteHaisoAdrsMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\RegMemAdrMethod;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsResponseModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModelInterface;
use Plugin\AceClient43\Bridge\Helper\CustomerAddressBridgeHelper;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostCreateOrUpdateCustomerAddressEvent;
use Plugin\AceClient43\Events\PreCreateOrUpdateCustomerAddressEvent;
use Plugin\AceClient43\Exception\CouldNotCreateOrUpdateCustomerAddressException;
use Plugin\AceClient43\Exception\CouldNotRemoveCustomerAddressException;

/**
 * 顧客住所連携ブリッジクラス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerAddressBridge extends BaseBridge
{
    private CustomerAddressBridgeHelper $helper;

    private RegMemAdrMethod $regMemAdrMethod;

    private DeleteHaisoAdrsMethod $deleteHaisoAdrsMethod;

    public function __construct(
        RegMemAdrMethod $regMemAdrMethod,
        DeleteHaisoAdrsMethod $deleteHaisoAdrsMethod,
        CustomerAddressBridgeHelper $helper,
    ) {
        $this->helper = $helper;
        $this->regMemAdrMethod = $regMemAdrMethod;
        $this->deleteHaisoAdrsMethod = $deleteHaisoAdrsMethod;
    }

    /**
     * 顧客の新規住所を作成
     *
     * @param CustomerAddress[] $addresses
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
            $this->createOrUpdate($address, false, $options);
        }

        if ($needFlush) {
            $this->em->flush();
        }

        return true;
    }

    /**
     * 顧客の住所を新規作成または更新
     *
     * @param CustomerAddress $address
     * @param mixed $needFlush
     * @param array $options
     *
     * @return bool
     *
     * @throws CouldNotCreateOrUpdateCustomerAddressException
     */
    public function createOrUpdate(CustomerAddress $address, bool $needFlush = true, array $options = []): bool
    {
        $customer = $address->getCustomer();
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの住所登録に失敗しました: 顧客IDが設定されていません', ['customer' => $customer]);
            throw new \LogicException('先に顧客を登録してください。');
        }

        $request = $this->helper->createRegMemAdrRequestModel($address, $this->getSyid(), $options);

        if ($this->eventDispatcher->hasListeners(Events::PRE_CREATE_OR_UPDATE_CUSTOMER_ADDRESS)) {
            $this->eventDispatcher->dispatch(
                new PreCreateOrUpdateCustomerAddressEvent($request, $address, $options),
                Events::PRE_CREATE_OR_UPDATE_CUSTOMER_ADDRESS
            );
        }

        try {
            $response = $this->regMemAdrMethod
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

            if ($this->eventDispatcher->hasListeners(Events::POST_CREATE_OR_UPDATE_CUSTOMER_ADDRESS)) {
                $this->eventDispatcher->dispatch(
                    new PostCreateOrUpdateCustomerAddressEvent($responseObject, $address, $options),
                    Events::POST_CREATE_OR_UPDATE_CUSTOMER_ADDRESS
                );
            }

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
     * 顧客の住所を削除
     *
     * @param Customer $customer
     * @param CustomerAddress $address
     * @param array $options
     *
     * @return bool
     *
     * @throws CouldNotRemoveCustomerAddressException
     */
    public function remove(Customer $customer, CustomerAddress $address, array $options = []): bool
    {
        if (null === $address->getAceEdaNo()) {
            return false;
        }

        $request = $this->helper->createDeleteHaisoAdrsRequestModel($customer, $address, $this->getSyid(), $options);

        try {
            $response = $this->deleteHaisoAdrsMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException(sprintf('通販Aceの住所削除に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var DeleteHaisoAdrsResponseModel $responseObject */
            $responseObject = $response->getResponse();

            if ($this->hasErrorMessage($responseObject->getMember())) {
                throw new CouldNotRemoveCustomerAddressException('通販Aceの住所削除に失敗しました。');
            }

            $address->setAceEdaNo(null);

            $this->em->persist($address);
            $this->em->flush($address);
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotRemoveCustomerAddressException) {
                $this->logger->error('通販Aceの住所削除に失敗しました', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの住所削除に失敗しました', ['exception' => $e]);
            throw new CouldNotRemoveCustomerAddressException('通販Aceの住所削除時にエラーが発生しました', $e);
        }

        return true;
    }
}
