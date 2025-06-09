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

namespace Plugin\AceClient43\EventListener;

use Eccube\Entity\CustomerAddress;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Repository\CustomerAddressRepository;
use Plugin\AceClient43\Bridge\CustomerAddressBridge;
use Plugin\AceClient43\Exception\CouldNotRemoveCustomerAddressException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * お届け先削除完了イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerDeliveryDeleteCompleteListener implements EventSubscriberInterface
{
    private CustomerAddressBridge $customerAddressBridge;

    private LoggerInterface $logger;

    private CustomerAddressRepository $customerAddressRepository;

    public function __construct(CustomerAddressBridge $customerAddressBridge, LoggerInterface $logger, CustomerAddressRepository $customerAddressRepository)
    {
        $this->customerAddressBridge = $customerAddressBridge;
        $this->logger = $logger;
        $this->customerAddressRepository = $customerAddressRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::FRONT_MYPAGE_DELIVERY_DELETE_COMPLETE => ['onDelete', 100],
            EccubeEvents::ADMIN_CUSTOMER_DELIVERY_DELETE_COMPLETE => ['onDelete', 100],
        ];
    }

    /**
     * お届け先削除完了イベントリスナー
     *
     * @param EventArgs $event
     *
     * @throws CouldNotRemoveCustomerAddressException
     */
    public function onDelete(EventArgs $event)
    {
        /** @var CustomerAddress $CustomerAddress */
        $CustomerAddress = $event->getArgument('CustomerAddress');
        $Customer = $event->getArgument('Customer');
        $this->logger->info('販Aceの顧客住所削除しています。',
            [
                'customer' => $Customer,
                'customer_address' => $CustomerAddress,
            ]
        );

        if ($CustomerAddress->getAceEdaNo()) {
            $this->logger->warning('削除しようとしている顧客住所のAceEdaNoが存在しません。削除処理をスキップします。', [
                'customer' => $Customer,
                'customer_address' => $CustomerAddress,
            ]);

            return;
        }

        $addressId = $CustomerAddress->getId();
        if ($addressId && null !== $this->customerAddressRepository->find($addressId)) {
            $this->logger->warning('削除しようとしている顧客住所はまだデータベースに存在しているため。削除処理をスキップします。', [
                'customer' => $Customer,
                'customer_address' => $CustomerAddress,
            ]);

            return;
        }

        try {
            $this->customerAddressBridge->remove($Customer, $CustomerAddress);
        } catch (CouldNotRemoveCustomerAddressException $e) {
            $this->logger->error('顧客住所の削除に失敗しました。', [
                'customer' => $Customer,
                'customer_address' => $CustomerAddress,
                'exception' => $e,
            ]);
            throw $e;
        }
    }
}
