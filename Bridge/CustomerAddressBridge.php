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
use Eccube\Repository\CustomerAddressRepository;
use Eccube\Repository\Master\PrefRepository;
use Plugin\AceClient43\AceServices\AceMethod\Member\DeleteHaisoAdrsMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\RegMemAdrMethod;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsResponseModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModelInterface;
use Plugin\AceClient43\Bridge\DataConverter\CustomerAddressDataConverterInterface;
use Plugin\AceClient43\Bridge\Helper\CustomerAddressBridgeHelper;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostCreateOrUpdateInAceCustomerAddressEvent;
use Plugin\AceClient43\Events\PostRemoveCustomerAddressEvent;
use Plugin\AceClient43\Events\PreCreateOrUpdateInAceCustomerAddressEvent;
use Plugin\AceClient43\Exception\CouldNotRemoveCustomerAddressException;
use Plugin\AceClient43\Exception\CouldNotSyncInAceCustomerAddressException;

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

    private CustomerAddressRepository $customerAddressRepository;

    private PrefRepository $prefRepository;

    private CustomerAddressDataConverterInterface $customerAddressDataConverter;

    public function __construct(
        RegMemAdrMethod $regMemAdrMethod,
        DeleteHaisoAdrsMethod $deleteHaisoAdrsMethod,
        CustomerAddressBridgeHelper $helper,
        CustomerAddressRepository $customerAddressRepository,
        PrefRepository $prefRepository,
        CustomerAddressDataConverterInterface $customerAddressDataConverter,
    ) {
        $this->helper = $helper;
        $this->regMemAdrMethod = $regMemAdrMethod;
        $this->deleteHaisoAdrsMethod = $deleteHaisoAdrsMethod;
        $this->customerAddressRepository = $customerAddressRepository;
        $this->prefRepository = $prefRepository;
        $this->customerAddressDataConverter = $customerAddressDataConverter;
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
            $this->syncCustomerAddressToAce($address, false, $options);
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
     * @throws CouldNotSyncInAceCustomerAddressException
     */
    public function syncCustomerAddressToAce(CustomerAddress $address, bool $needFlush = true, array $options = []): bool
    {
        $customer = $address->getCustomer();
        if (null === $customer->getAceCustomerId()) {
            $this->logger->error('通販Aceの住所登録に失敗しました: 顧客IDが設定されていません', ['customer' => $customer]);
            throw new \LogicException('先に顧客を登録してください。');
        }

        $request = $this->helper->createRegMemAdrRequestModel($address, $this->getSyid(), $options);

        if ($this->eventDispatcher->hasListeners(Events::PRE_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS)) {
            $this->eventDispatcher->dispatch(
                new PreCreateOrUpdateInAceCustomerAddressEvent($request, $address, $options),
                Events::PRE_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS
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
                throw new CouldNotSyncInAceCustomerAddressException('通販Aceの住所登録に失敗しました。');
            }

            $address->setAceEdaNo($responseObject->getMember()->getNmember()->getEda());

            $this->em->persist($address);
            if ($needFlush) {
                $this->em->flush($address);
            }

            if ($this->eventDispatcher->hasListeners(Events::POST_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS)) {
                $this->eventDispatcher->dispatch(
                    new PostCreateOrUpdateInAceCustomerAddressEvent($responseObject, $address, $options),
                    Events::POST_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS
                );
            }
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotSyncInAceCustomerAddressException) {
                $this->logger->error('通販Aceの住所登録に失敗しました', ['exception' => $e]);
                throw $e;
            }

            $this->logger->error('通販Aceの住所登録に失敗しました', ['exception' => $e]);
            throw new CouldNotSyncInAceCustomerAddressException('通販Aceの住所登録時にエラーが発生しました', $e);
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

            if ($this->eventDispatcher->hasListeners(Events::POST_REMOVE_CUSTOMER_ADDRESS)) {
                $this->eventDispatcher->dispatch(new PostRemoveCustomerAddressEvent($address, $customer, $responseObject), Events::POST_REMOVE_CUSTOMER_ADDRESS);
            }
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

    /**
     * 通販Aceの住所情報を顧客エンティティに反映する
     *
     * @param GetHaisouAdrsModel[] $aceCustomerAddresses
     * @param Customer $customer
     * @param bool $needFlush
     * @param array $options
     */
    public function syncCustomerAddressFromAce(array $aceCustomerAddresses, Customer $customer, bool $needFlush = true, array $options = [])
    {
        /** @var GetHaisouAdrsModel $aceCustomerAddress */
        foreach ($aceCustomerAddresses as $aceCustomerAddress) {
            if ($aceCustomerAddress->getEda() !== '1') {
                $customerAddress = $this->customerAddressDataConverter->convertCustomerAddressAceToEntity($aceCustomerAddress, $customer);
                $this->em->persist($customerAddress);
                if ($needFlush) {
                    $this->em->flush($customerAddress);
                }
            }
        }
    }
}
