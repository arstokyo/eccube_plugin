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
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMember\RegMemberResponseModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PostRegisterCustomerEvent extends Event
{
    /**
     * @var RegMemberResponseModelInterface
     */
    private $regMemberResponseModel;

    /**
     * @var Customer
     */
    private $customer;

    private array $options;

    public function __construct(
        RegMemberResponseModelInterface $regMemberResponseModel,
        Customer $customer,
        array $options,
    ) {
        $this->regMemberResponseModel = $regMemberResponseModel;
        $this->customer = $customer;
        $this->options = $options;
    }

    public function getRegMemberResponseModel(): RegMemberResponseModelInterface
    {
        return $this->regMemberResponseModel;
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
