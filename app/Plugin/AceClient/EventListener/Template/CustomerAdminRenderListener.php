<?php

namespace Plugin\AceClient43\EventListener\Template;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CustomerAdminRenderListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            '@admin/Customer/edit.twig' => 'onAdminCustomerEdit',
            '@admin/Customer/index.twig' => 'onAdminCustomerIndex',
        ];
    }

    public function onAdminCustomerEdit(TemplateEvent $event): void
    {
        $event->addSnippet('@AceClient43/admin/admin_customer_edit.twig');
    }

    public function onAdminCustomerIndex(TemplateEvent $event): void
    {
        $event->addSnippet('@AceClient43/admin/customer_index.twig');
    }
}
