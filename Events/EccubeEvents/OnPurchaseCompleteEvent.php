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

namespace Plugin\AceClient43\Events\EccubeEvents;

use Eccube\Entity\Order;
use Symfony\Contracts\EventDispatcher\Event;

class OnPurchaseCompleteEvent extends Event
{
    public Order $Order;

    public array $decisionOptions = [];

    public bool $shouldFlush = false;

    public array $options = [];

    public function __construct(Order $Order, array $decisionOptions = [], bool $shouldFlush = false, array $options = [])
    {
        $this->Order = $Order;
        $this->decisionOptions = $decisionOptions;
        $this->shouldFlush = $shouldFlush;
        $this->options = $options;
    }
}
