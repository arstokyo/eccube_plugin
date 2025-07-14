<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;

interface CustomerAddressDataConverterInterface
{
    /**
     * Convert EC-CUBE CustomerAddress to ACE RegMemAdr request
     *
     * @param CustomerAddress $address
     * @param string $syid
     * @param array $options
     *
     * @return RegMemAdrRequestModel
     */
    public function convertCustomerAddressToRegMemAdrRequest(CustomerAddress $address, string $syid, array $options = []): RegMemAdrRequestModel;

    /**
     * Convert EC-CUBE CustomerAddress to ACE DeleteHaisoAdrs request
     *
     * @param Customer $customer
     * @param CustomerAddress $address
     * @param string $syid
     * @param array $options
     *
     * @return DeleteHaisoAdrsRequestModel
     */
    public function convertCustomerAddressToDeleteRequest(Customer $customer, CustomerAddress $address, string $syid, array $options = []): DeleteHaisoAdrsRequestModel;
}
