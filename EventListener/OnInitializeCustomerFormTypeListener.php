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
use Plugin\AceClient43\Repository\ConfigRepository;
use Plugin\AceClient43\Validator\UniqueCustomer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * 顧客フォームの初期化イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OnInitializeCustomerFormTypeListener implements EventSubscriberInterface
{
    private ConfigRepository $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::ADMIN_CUSTOMER_EDIT_INDEX_INITIALIZE => ['onInitializeAdmin', 100],
            EccubeEvents::FRONT_ENTRY_INDEX_INITIALIZE => ['onInitializeFront', 100],
        ];
    }

    public function onInitializeAdmin(EventArgs $event)
    {
        $this->processInitialize($event, EccubeEvents::ADMIN_CUSTOMER_EDIT_INDEX_INITIALIZE);
    }

    public function onInitializeFront(EventArgs $event)
    {
        $this->processInitialize($event, EccubeEvents::FRONT_ENTRY_INDEX_INITIALIZE);
    }

    /**
     * フロントエントリーインデックス初期化イベント
     *
     * このメソッドは、フロントエントリーインデックスの初期化イベントを処理します。
     * このイベントは、顧客のメールアドレスが一意であることを検証するために使用されます。
     *
     * @param EventArgs $event
     * @param string $eventName
     */
    private function processInitialize(EventArgs $event, string $eventName)
    {
        $aceConfig = $this->configRepository->get();
        $transDomain = null;
        if ($eventName === EccubeEvents::FRONT_ENTRY_INDEX_INITIALIZE) {
            if (!$aceConfig->isValidateDuplicateEntry()) {
                return;
            }

            $transDomain = UniqueCustomer::TRANS_FRONT_DOMAIN;
        }

        if ($eventName === EccubeEvents::ADMIN_CUSTOMER_EDIT_INDEX_INITIALIZE) {
            if (!$aceConfig->isValidateDuplicateAdminEntry()) {
                return;
            }

            $transDomain = UniqueCustomer::TRANS_ADMIN_DOMAIN;
        }

        /** @var FormBuilderInterface $builder */
        $builder = $event->getArgument('builder');

        if ($emailBuilder = $builder->get('email')) {
            $options = $emailBuilder->getOptions();
            $type = $emailBuilder->getType()->getInnerType();

            $constraints = $options['constraints'] ?? [];
            $constraints = array_merge($constraints, [
                new UniqueCustomer(['translationDomain' => $transDomain]),
            ]);

            $builder->remove('email');
            $builder->add('email', get_class($type), array_merge($options, [
                'constraints' => $constraints,
            ]));
        }
    }
}
