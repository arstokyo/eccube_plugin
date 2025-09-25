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
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr\RegMemAdrResponseModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PostCreateOrUpdateInAceCustomerAddressEvent extends Event
{
    /**
     * @var RegMemAdrResponseModelInterface
     */
    private $regMemAdrResponseModel;

    /**
     * @var CustomerAddress
     */
    private $customerAddress;

    private array $options;

    /**
     * @param RegMemAdrResponseModel $regMemAdrResponseModel
     * @param CustomerAddress $customer
     */
    public function __construct(
        RegMemAdrResponseModelInterface $regMemAdrResponseModel,
        CustomerAddress $customer,
        array $options,
    ) {
        $this->regMemAdrResponseModel = $regMemAdrResponseModel;
        $this->customerAddress = $customer;
        $this->options = $options;
    }

    public function getRegMemAdrResponseModel(): RegMemAdrResponseModelInterface
    {
        return $this->regMemAdrResponseModel;
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
