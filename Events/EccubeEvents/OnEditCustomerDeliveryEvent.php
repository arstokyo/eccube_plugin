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

use Eccube\Entity\CustomerAddress;
use Symfony\Contracts\EventDispatcher\Event;

class OnEditCustomerDeliveryEvent extends Event
{
    private CustomerAddress $customerAddress;

    public function __construct(CustomerAddress $customerAddress)
    {
        $this->customerAddress = $customerAddress;
    }

    /**
     * @return CustomerAddress
     */
    public function getCustomerAddress(): CustomerAddress
    {
        return $this->customerAddress;
    }
}
