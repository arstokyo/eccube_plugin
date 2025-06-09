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

use Eccube\Entity\Customer;
use Eccube\Entity\Shipping;
use Symfony\Contracts\EventDispatcher\Event;

class OnNewShippingFromCustomerEvent extends Event
{
    private Shipping $shipping;

    private Customer $customer;

    public function __construct(Shipping $shipping, Customer $customer)
    {
        $this->shipping = $shipping;
        $this->customer = $customer;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
