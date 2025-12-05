<?php

namespace Plugin\AceClient43\EventListener\Template;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ShopSettingAdminRenderListener implements EventSubscriberInterface
{
    /**
     * 購読するイベントを定義
     */
    public static function getSubscribedEvents(): array
    {
        return [
            '@admin/Setting/Shop/payment_edit.twig' => 'onPaymentEdit',
            '@admin/Setting/Shop/payment.twig' => 'onPaymentIndex',
            '@admin/Setting/Shop/delivery_edit.twig' => 'onDeliveryEdit',
        ];
    }

    public function onPaymentEdit(TemplateEvent $event): void
    {
        $event->addSnippet('@AceClient43/admin/Setting/Shop/payment_edit.twig');
    }

    public function onPaymentIndex(TemplateEvent $event): void
    {
        $event->addSnippet('@AceClient43/admin/Setting/Shop/payment_index.twig');
    }

    /**
     * 配送方法編集画面にスニペットを注入
     */
    public function onDeliveryEdit(TemplateEvent $event): void
    {
        $event->addSnippet('@AceClient43/admin/Setting/Shop/delivery_edit.twig');
    }
}
