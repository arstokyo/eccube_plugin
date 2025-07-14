<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;

interface CustomerDataConverterInterface
{
    /**
     * Convert EC-CUBE Customer to ACE RegMember JmemberModel
     *
     * @param Customer $customer
     * @param array $options
     *
     * @return RegMember\JmemberModelInterface
     */
    public function convertCustomerToJmember(Customer $customer, array $options = []): RegMember\JmemberModelInterface;

    /**
     * Convert EC-CUBE Customer to ACE RegMember request
     *
     * @param Customer $customer
     * @param string $syid
     * @param array $options
     *
     * @return RegMember\RegMemberRequestModelInterface
     */
    public function convertCustomerToRegMemberRequest(Customer $customer, string $syid, array $options = []): RegMember\RegMemberRequestModelInterface;

    /**
     * Convert ACE GetMember response to EC-CUBE Customer
     *
     * @param GetMember\LoginMemberModelInterface $aceCustomer
     * @param Customer $customer
     * @param array $options
     *
     * @return Customer
     */
    public function convertGetMemberToCustomer(GetMember\LoginMemberModelInterface $aceCustomer, Customer $customer, array $options = []): Customer;

    /**
     * Convert ACE GetMemberMcode response to EC-CUBE Customer
     *
     * @param GetMemberMcode\LoginMemberModelInterface $aceCustomer
     * @param Customer $customer
     * @param array $options
     *
     * @return Customer
     */
    public function convertGetMemberMcodeToCustomer(GetMemberMcode\LoginMemberModelInterface $aceCustomer, Customer $customer, array $options = []): Customer;
}
