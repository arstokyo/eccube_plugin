<?php

namespace Plugin\AceClient43\EventListener\Template;

use Eccube\Event\TemplateEvent;
use Plugin\AceClient43\Service\AceConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductAdminRenderListener implements EventSubscriberInterface
{
    protected AceConfigService $aceConfigService;

    public function __construct(AceConfigService $aceConfigService)
    {
        $this->aceConfigService = $aceConfigService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            '@admin/Product/index.twig' => 'onAdminProductIndex',
        ];
    }

    public function onAdminProductIndex(TemplateEvent $event): void
    {
        if (!$this->aceConfigService->shouldSyncProductOnAdminPage()) {
            return;
        }

        $event->addSnippet('@AceClient43/admin/product_index.twig');
    }
}
