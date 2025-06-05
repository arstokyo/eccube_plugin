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
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Symfony\Contracts\EventDispatcher\Event;

class OnGetAndUpdateCustomerEvent extends Event
{
    /**
     * @var GetMemberMcode\LoginMemberModelInterface|GetMember\LoginMemberModelInterface
     */
    private $loginMemberModel;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @param GetMemberMcode\LoginMemberModelInterface|GetMember\LoginMemberModelInterface $loginMemberModel
     * @param Customer $customer
     */
    public function __construct(
        $loginMemberModel,
        Customer $customer,
    ) {
        $this->loginMemberModel = $loginMemberModel;
        $this->customer = $customer;
    }

    /**
     * @return GetMemberMcode\LoginMemberModelInterface|GetMember\LoginMemberModelInterface
     */
    public function getLoginMemberModel()
    {
        return $this->loginMemberModel;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
