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

use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModel;
use Symfony\Contracts\EventDispatcher\Event;

class PostCreateOrUpdateCustomerAddressEvent extends Event
{
    /**
     * @var RegMemAdrResponseModel
     */
    private $regMemAdrResponseModel;

    /**
     * @var CustomerAddress
     */
    private $customerAddress;

    /**
     * @param RegMemAdrResponseModel $regMemAdrResponseModel
     * @param CustomerAddress $customer
     */
    public function __construct(
        RegMemAdrResponseModel $regMemAdrResponseModel,
        CustomerAddress $customer,
    ) {
        $this->regMemAdrResponseModel = $regMemAdrResponseModel;
        $this->customerAddress = $customer;
    }

    public function getRegMemAdrResponseModel(): RegMemAdrResponseModel
    {
        return $this->regMemAdrResponseModel;
    }

    public function getCustomerAddress(): CustomerAddress
    {
        return $this->customerAddress;
    }
}
