<?php

namespace Plugin\AceClient43\EventListener\Template;

use Eccube\Entity\Order;
use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OrderAdminRenderListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            '@admin/Order/edit.twig' => 'onOrderEdit',
            '@admin/Order/index.twig' => 'onRenderIndex',
        ];
    }

    public function onOrderEdit(TemplateEvent $event): void
    {
        if (!$this->shouldRender($event)) {
            return;
        }

        $event->addSnippet('@AceClient43/admin/admin_order_edit.twig');
    }

    public function onRenderIndex(TemplateEvent $event): void
    {
        if (!$this->shouldRender($event)) {
            return;
        }

        $event->addSnippet('@AceClient43/admin/admin_order_index.twig');
    }

    private function shouldRender(TemplateEvent $event): bool
    {
        return property_exists(Order::class, 'ace_order_id');
    }
}
