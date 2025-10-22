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

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;
use Eccube\Entity\Customer;
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
     * Shippingの顧客住所EdaNoを取得
     *
     * CustomerAddressはNullであれば、AcePrimaryAddressEdanoを返します（本人住所）。
     *
     * @return int
     */
    public function getCustomerAddressEdano(): int
    {
        return $this->hasCustomerAddressEdano() ? $this->getCustomerAddress()->getAceEdaNo() : Customer::getAcePrimaryAddressEdano();
    }

    /**
     * 顧客住所が設定されているか判定するショートカット
     */
    public function hasCustomerAddress(): bool
    {
        return null !== $this->customer_address;
    }

    public function hasCustomerAddressEdano(): bool
    {
        return $this->hasCustomerAddress() && $this->getCustomerAddress()->hasAceEdaNo();
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

    public function updateCustomerAddress(CustomerAddress $customerAddress): void
    {
        // CustomerAddressのAceEdaNoが設定されている場合は、Shippingに設定する
        // AceEdaNoはNullの場合は、本人の住所
        if ($customerAddress->hasAceEdaNo()) {
            $this->setCustomerAddress($customerAddress);
        } else {
            $this->setCustomerAddress(null);
        }
    }

    /**
     * 指定されたCustomerAddressは本ShippingのCustomerAddressであるのか
     *
     * @param CustomerAddress $customerAddress
     * @return bool
     */
    public function isMatchCustomerAddress(CustomerAddress $customerAddress): bool
    {
        // 1: EdaNoが設定された場合はEdanoベースで比較します
        if ($customerAddress->hasAceEdaNo()) {
            return $this->getCustomerAddressEdano() === $customerAddress->getAceEdaNo();
        }

        // 2: EdaNoが設定されていない場合は、EccubeのgetShippingMultipleDefaultNameをフォールバック
        return $this->getShippingMultipleDefaultName() === $customerAddress->getShippingMultipleDefaultName();
    }
}
