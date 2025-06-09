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

use Eccube\Entity\Customer;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Plugin\AceClient43\Exception\CouldNotCheckCustomerExistingException;
use Plugin\AceClient43\Exception\CouldNotRegisterNewCustomerException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * 管理画面の顧客編集完了イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AdminCustomerEditIndexCompleteListener implements EventSubscriberInterface
{
    private CustomerBridge $customerBridge;

    private LoggerInterface $logger;

    public function __construct(CustomerBridge $customerBridge, LoggerInterface $logger)
    {
        $this->customerBridge = $customerBridge;
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::ADMIN_CUSTOMER_EDIT_INDEX_COMPLETE => ['onComplete', 100],
        ];
    }

    /**
     *  フロントエントリーインデックス初期化イベント
     *
     * @param EventArgs $event
     *
     * @throws CouldNotCheckCustomerExistingException
     * @throws CouldNotRegisterNewCustomerException
     * @throws \Throwable
     */
    public function onComplete(EventArgs $event)
    {
        /** @var Customer $Customer */
        $Customer = $event->getArgument('Customer');
        $this->logger->info('[AdminCustomerEditIndexCompleteListener] 通販Aceの顧客情報を登録しています。', [
            'customer' => $Customer,
        ]);

        try {
            $this->customerBridge->createOrUpdate($Customer);
        } catch (\Throwable $e) {
            $this->logger->error('[AdminCustomerEditIndexCompleteListener] 通販Aceの顧客情報登録に失敗しました。', [
                'exception' => $e,
                'customer' => $Customer,
            ]);
            throw $e;
        }
    }
}
