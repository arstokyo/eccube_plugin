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

use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FrontMypageChangeIndexCompleteListener implements EventSubscriberInterface
{
    public function __construct(
        private LoggerInterface $logger,
        private CustomerBridge $customerBridge,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            EccubeEvents::FRONT_MYPAGE_CHANGE_INDEX_COMPLETE => 'onComplete',
        ];
    }

    /**
     * 会員情報更新完了イベントリスナー
     *
     * @param EventArgs $event
     */
    public function onComplete(EventArgs $event): void
    {
        try {
            $Customer = $event->getArgument('Customer');
            $this->customerBridge->update($Customer);
        } catch (\Throwable $e) {
            $this->logger->error('[FrontMypageChangeIndexCompleteListener] 会員情報更新に失敗しました。', [
                'exception' => $e,
                'customer' => $Customer,
            ]);
            throw $e;
        }
    }
}
