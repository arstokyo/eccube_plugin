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
use Plugin\AceClient43\Bridge\CustomerAddressBridge;
use Plugin\AceClient43\Exception\CouldNotCreateOrUpdateCustomerAddressException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * お届け先編集完了イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerDeliveryEditCompleteListener implements EventSubscriberInterface
{
    private CustomerAddressBridge $customerAddressBridge;

    private LoggerInterface $logger;

    public function __construct(CustomerAddressBridge $customerAddressBridge, LoggerInterface $logger)
    {
        $this->customerAddressBridge = $customerAddressBridge;
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::FRONT_MYPAGE_DELIVERY_EDIT_COMPLETE => ['onEditComplete', 100],
            EccubeEvents::ADMIN_CUSTOMER_DELIVERY_EDIT_INDEX_COMPLETE => ['onEditComplete', 100],
        ];
    }

    /**
     * お届け先編集完了イベントリスナー
     *
     * @param EventArgs $event
     *
     * @throws CouldNotCreateOrUpdateCustomerAddressException
     */
    public function onEditComplete(EventArgs $event)
    {
        /** @var CustomerAddress $CustomerAddress */
        $CustomerAddress = $event->getArgument('CustomerAddress');
        $this->logger->info('通販Aceの顧客住所を編集しています。', ['customer_address' => $CustomerAddress]);

        try {
            $this->customerAddressBridge->createOrUpdate($CustomerAddress, true);
        } catch (CouldNotCreateOrUpdateCustomerAddressException $e) {
            $this->logger->error('通販Aceの顧客住所の編集に失敗しました。', [
                'customer_address' => $CustomerAddress,
                'exception' => $e,
            ]);
            throw $e;
        }
    }
}
