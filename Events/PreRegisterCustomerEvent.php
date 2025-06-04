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

namespace App\Plugin\AceClient43\Events;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember\RegMemberRequestModel;
use Symfony\Contracts\EventDispatcher\Event;

class PreRegisterCustomerEvent extends Event
{
    /**
     * @var RegMemberRequestModel
     */
    private $regMemberRequestModel;

    /**
     * @var Customer
     */
    private $customer;

    public function __construct(
        RegMemberRequestModel $regMemberRequestModel,
        Customer $customer,
    ) {
        $this->regMemberRequestModel = $regMemberRequestModel;
        $this->customer = $customer;
    }

    public function getRegMemberRequestModel(): RegMemberRequestModel
    {
        return $this->regMemberRequestModel;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
