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
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMember\RegMemberResponseModel;
use Symfony\Contracts\EventDispatcher\Event;

class PostRegisterCustomerEvent extends Event
{
    /**
     * @var RegMemberResponseModel
     */
    private $regMemberResponseModel;

    /**
     * @var Customer
     */
    private $customer;

    public function __construct(
        RegMemberResponseModel $regMemberResponseModel,
        Customer $customer,
    ) {
        $this->regMemberResponseModel = $regMemberResponseModel;
        $this->customer = $customer;
    }

    public function getRegMemberResponseModel(): RegMemberResponseModel
    {
        return $this->regMemberResponseModel;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
