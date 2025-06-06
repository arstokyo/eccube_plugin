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

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Entity\Config;
use Symfony\Contracts\EventDispatcher\Event;

class PostProcessDiscountEvent extends Event
{
    private Order $order;
    private Config $config;
    private PurchaseContext $purchaseContext;

    public function __construct(
        Order $order,
        Config $config,
        PurchaseContext $purchaseContext,
    ) {
        $this->order = $order;
        $this->config = $config;
        $this->purchaseContext = $purchaseContext;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function getPurchaseContex(): PurchaseContext
    {
        return $this->purchaseContext;
    }
}
