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
            '@admin/Product/product.twig' => 'onAdminProductEdit',
        ];
    }

    public function onAdminProductIndex(TemplateEvent $event): void
    {
        if (!$this->aceConfigService->shouldSyncProductOnAdminPage()) {
            return;
        }

        $event->addSnippet('@AceClient43/admin/product_index.twig');
    }

    public function onAdminProductEdit(TemplateEvent $event): void
    {
        $event->addSnippet('@AceClient43/admin/admin_product_edit.twig');
    }
}
