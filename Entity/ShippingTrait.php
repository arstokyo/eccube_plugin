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

namespace Plugin\AceClient43\Entity;

use Eccube\Entity\CustomerAddress;

/**
 * @EntityExtension("Eccube\Entity\Shipping")
 */
trait ShippingTrait
{
    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\CustomerAddress")
     *
     * @ORM\JoinColumns({
     *
     *   @ORM\JoinColumn(name="customer_address_id", referencedColumnName="id")
     * })
     */
    private $customer_address;

    /**
     * 顧客住所登録
     *
     * @return CustomerAddress|CustomerAddressTrait|null
     */
    public function getCustomerAddress()
    {
        return $this->customer_address;
    }

    /**
     * 顧客住所を設定する
     *
     * @param CustomerAddress|CustomerAddressTrait|null $customer_address
     *
     * @return $this
     */
    public function setCustomerAddress($customer_address)
    {
        $this->customer_address = $customer_address;

        return $this;
    }
}
