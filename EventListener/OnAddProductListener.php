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

use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnAddProductEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OnAddProductListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::ON_ADD_PRODUCT => ['onAddProduct', 100],
        ];
    }

    public function onAddProduct(OnAddProductEvent $event)
    {
    }
}
