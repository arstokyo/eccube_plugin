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

use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Symfony\Contracts\EventDispatcher\Event;

class PreCreateOrUpdateCustomerAddressEvent extends Event
{
    /**
     * @var RegMemAdrRequestModel
     */
    private $regMemAdrRequestModel;

    /**
     * @var CustomerAddress
     */
    private $customerAddress;

    private array $options;

    /**
     * @param RegMemAdrRequestModel $regMemAdrRequestModel
     * @param \Eccube\Entity\Customer $customer
     */
    public function __construct(
        RegMemAdrRequestModel $regMemAdrRequestModel,
        CustomerAddress $customerAddress,
        array $options,
    ) {
        $this->regMemAdrRequestModel = $regMemAdrRequestModel;
        $this->customerAddress = $customerAddress;
        $this->options = $options;
    }

    public function getRegMemAdrRequestModel(): RegMemAdrRequestModel
    {
        return $this->regMemAdrRequestModel;
    }

    public function getCustomerAddress(): CustomerAddress
    {
        return $this->customerAddress;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
