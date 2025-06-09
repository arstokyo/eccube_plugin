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
use Plugin\AceClient43\Exception\CouldNotRemoveCustomerAddressException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * お届け先削除完了イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class FrontMypageDeliveryDeleteCompleteListener implements EventSubscriberInterface
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
            EccubeEvents::FRONT_MYPAGE_DELIVERY_DELETE_COMPLETE => ['onFrontMypageDeliveryDeleteComplete', 100],
        ];
    }

    /**
     * お届け先削除完了イベントリスナー
     *
     * @param EventArgs $event
     *
     * @throws CouldNotRemoveCustomerAddressException
     */
    public function onFrontMypageDeliveryDeleteComplete(EventArgs $event)
    {
        $Customer = $event->getArgument('Customer');
        /** @var CustomerAddress $CustomerAddress */
        $CustomerAddress = $event->getArgument('CustomerAddress');
        $this->logger->info('[FrontMypageDeliveryDeleteCompleteListener] 通販Aceの顧客住所削除しています。',
            [
                'customer' => $Customer,
                'customer_address' => $CustomerAddress,
            ]
        );

        if (null === $CustomerAddress->getAceEdaNo()) {
            $this->logger->warning('顧客住所の通販Ace枝番号が設定されていません。削除処理をスキップします。', [
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
