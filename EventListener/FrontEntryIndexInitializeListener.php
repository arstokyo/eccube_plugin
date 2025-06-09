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
 * お届け先削除完了イベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class FrontEntryIndexInitializeListener implements EventSubscriberInterface
{
    private ConfigRepository $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::FRONT_ENTRY_INDEX_INITIALIZE => ['onFrontEntryIndexInitialize', 100],
        ];
    }

    /**
     *  フロントエントリーインデックス初期化イベント
     *
     * @param EventArgs $eventArgs
     */
    public function onFrontEntryIndexInitialize(EventArgs $event)
    {
        $aceConfig = $this->configRepository->get();
        if (!$aceConfig->needValidateCustomerExisting()) {
            return;
        }

        /** @var FormBuilderInterface $builder */
        $builder = $event->getArgument('builder');

        if ($emailBuilder = $builder->get('email')) {
            $options = $emailBuilder->getOptions();
            $type = $emailBuilder->getType()->getInnerType();

            $builder->remove('email');
            $builder->add('email', get_class($type), array_merge($options, [
                'constraints' => [
                    new UniqueCustomer(),
                ],
            ]));
        }
    }
}
