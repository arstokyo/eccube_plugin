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
use Plugin\AceClient43\Service\AceConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 管理画面の注文編集インデックスイベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AdminOrderEditIndexListener implements EventSubscriberInterface
{
    private AceConfigService $configService;

    public function __construct(AceConfigService $configService)
    {
        $this->configService = $configService;
    }

    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::ADMIN_ORDER_EDIT_INDEX_INITIALIZE => 'onEdit',
        ];
    }

    /**
     *  フロントエントリーインデックス初期化イベント
     *
     * @param EventArgs $event
     *
     * @return void
     */
    public function onEdit(EventArgs $event)
    {
        if (!$this->configService->shouldUseAceDiscount()) {
            return;
        }

        /** @var FormBuilderInterface $builder */
        $builder = $event->getArgument('builder');

        $builder->add('ace_point_discount', NumberType::class, [
            'required' => false,
            'constraints' => [
                new Assert\Regex([
                    'pattern' => '/^-\d+(\.\d+)?$/',
                    'message' => 'ace_client.admin.order.error.positive_discount_point',
                ]),
            ],
        ]);
    }
}
