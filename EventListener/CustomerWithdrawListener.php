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
use Plugin\AceClient43\AceServices\Model\Request\Member\UpdateTaikai\UpdateTaikaiRequestModelInterface;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Plugin\AceClient43\Exception\CouldNotCheckCustomerExistingException;
use Plugin\AceClient43\Exception\CouldNotRegisterNewCustomerException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * 退会確認画面完了イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CustomerWithdrawListener implements EventSubscriberInterface
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
            EccubeEvents::FRONT_MYPAGE_WITHDRAW_INDEX_COMPLETE => ['onComplete', 100],
        ];
    }

    /**
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
        $this->logger->info('[CustomerWithdrawListener] 顧客の退会処理を開始しています。', [
            'customer_id' => $Customer->getId(),
            'ace_customer_id' => $Customer->getAceCustomerId(),
            'email' => $Customer->getEmail(),
        ]);

        try {
            $this->customerBridge->updateCustomerStatusInAce($Customer, UpdateTaikaiRequestModelInterface::TAIKAI_WITHDRAWN);

            $this->logger->info('[CustomerWithdrawListener] 顧客の退会処理が完了しました。', [
                'customer_id' => $Customer->getId(),
                'ace_customer_id' => $Customer->getAceCustomerId(),
                'status' => UpdateTaikaiRequestModelInterface::TAIKAI_WITHDRAWN,
            ]);
        } catch (\Throwable $e) {
            $this->logger->error('[CustomerWithdrawListener] 通販Aceの顧客退会処理に失敗しました。', [
                'exception_message' => $e->getMessage(),
                'exception_class' => get_class($e),
                'customer_id' => $Customer->getId(),
                'ace_customer_id' => $Customer->getAceCustomerId(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
