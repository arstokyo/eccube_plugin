<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModelInterface;

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

    /**
     * Convert ACE CustomerAddress to EC-CUBE CustomerAddress
     *
     * @param GetHaisouAdrsModelInterface $aceCustomerAddress
     * @param Customer $customer
     *
     * @return CustomerAddress
     */
    public function convertCustomerAddressAceToEntity(GetHaisouAdrsModelInterface $aceCustomerAddress, Customer $customer): CustomerAddress;
}
