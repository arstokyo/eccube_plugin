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
use Eccube\Entity\CustomerAddress;

/**
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{
    /** @var int 本人住所の枝番 */
    public const ACE_PRIMARY_ADDRESS_EDA_NO = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ace_customer_id", type="string", length=255, nullable=true, options={"comment":"ACE顧客ID"}, unique=true)
     */
    private ?string $ace_customer_id = null;

    /**
     * mem_idの値を取得する
     *
     * @return string|null
     */
    public function getAceCustomerId(): ?string
    {
        return $this->ace_customer_id;
    }

    /**
     * mem_idの値を設定する
     *
     * @param string|null $ace_customer_id
     *
     * @return $this
     */
    public function setAceCustomerId(?string $ace_customer_id)
    {
        $this->ace_customer_id = $ace_customer_id;

        return $this;
    }

    /**
     * mem_idの値が設定されているかどうかを返す
     *
     * @return bool
     */
    public function hasAceCustomerId(): bool
    {
        return !empty($this->ace_customer_id);
    }

    public function getCustomerAddressByEdaNo(int $edaNo): ?CustomerAddress
    {
        return $this->getCustomerAddresses()->filter(function (CustomerAddress $customerAddress) use ($edaNo) {
            return $customerAddress->getAceEdaNo() === $edaNo;
        })->first();
    }

    /**
     * @return array<{string, CustomerAddress}>
     */
    public function getAllCustomerAddressesWithEda(): array
    {
        // 本人住所
        $primaryAddress = (new CustomerAddress())
            ->setFromCustomer($this);

        $addresses = [self::ACE_PRIMARY_ADDRESS_EDA_NO => $primaryAddress];

        foreach ($this->getCustomerAddresses() as $customerAddress) {
            $addresses[(string) $customerAddress->getAceEdaNo()] = $customerAddress;
        }

        return $addresses;
    }

    public function getAllCustomerAddressWithId(): array
    {
        $primaryAddress = (new CustomerAddress())
            ->setFromCustomer($this);

        $addresses = [0 => $primaryAddress];

        /** @var CustomerAddress $customerAddress */
        foreach ($this->getCustomerAddresses() as $customerAddress) {
            $addresses[$customerAddress->getId()] = $customerAddress;
        }

        return $addresses;
    }

    public static function getAcePrimaryAddressEdano(): int
    {
        return self::ACE_PRIMARY_ADDRESS_EDA_NO;
    }
}
