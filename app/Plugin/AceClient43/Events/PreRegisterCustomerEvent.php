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

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember\RegMemberRequestModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreRegisterCustomerEvent extends Event
{
    /**
     * @var RegMemberRequestModelInterface
     */
    private $regMemberRequestModel;

    /**
     * @var Customer
     */
    private $customer;

    private $options;

    public function __construct(
        RegMemberRequestModelInterface $regMemberRequestModel,
        Customer $customer,
        array $options,
    ) {
        $this->regMemberRequestModel = $regMemberRequestModel;
        $this->customer = $customer;
        $this->options = $options;
    }

    public function getRegMemberRequestModel(): RegMemberRequestModelInterface
    {
        return $this->regMemberRequestModel;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
