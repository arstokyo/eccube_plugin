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
use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnEditCustomerDeliveryEvent;
use Plugin\AceClient43\Exception\CouldNotSyncInAceCustomerAddressException;
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
            Events::ON_EDIT_CUSTOMER_DELIVERY => ['onEditCustomerDelivery', 100],
        ];
    }

    /**
     * お届け先編集完了イベントリスナー
     *
     * @param OnEditCustomerDeliveryEvent $event
     *
     * @throws CouldNotSyncInAceCustomerAddressException
     */
    public function onEditCustomerDelivery(OnEditCustomerDeliveryEvent $event)
    {
        $CustomerAddress = $event->getCustomerAddress();
        $this->process($CustomerAddress);
    }

    /**
     * お届け先編集完了イベントリスナー
     *
     * @param EventArgs $event
     *
     * @throws CouldNotSyncInAceCustomerAddressException
     */
    public function onEditComplete(EventArgs $event)
    {
        /** @var CustomerAddress $CustomerAddress */
        $CustomerAddress = $event->getArgument('CustomerAddress');
        $this->process($CustomerAddress);
    }

    /**
     * 顧客住所の編集処理
     *
     * @param CustomerAddress $CustomerAddress
     *
     * @throws CouldNotSyncInAceCustomerAddressException
     */
    private function process(CustomerAddress $CustomerAddress)
    {
        $this->logger->info('通販Aceの顧客住所を編集しています。', ['customer_address' => $CustomerAddress]);

        try {
            $this->customerAddressBridge->syncCustomerAddressToAce($CustomerAddress, true);
        } catch (CouldNotSyncInAceCustomerAddressException $e) {
            $this->logger->error('通販Aceの顧客住所の編集に失敗しました。', [
                'customer_address' => $CustomerAddress,
                'exception' => $e,
            ]);
            throw $e;
        }
    }
}
