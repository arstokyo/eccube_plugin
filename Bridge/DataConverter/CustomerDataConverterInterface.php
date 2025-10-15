<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode\GetMemberMcodeRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Request\Member\UpdatePassword\UpdatePasswordRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode\LoginMemberModelInterface;

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
     * Convert EC-CUBE Customer to ACE GetMember request
     *
     * @param string $aceCustomerId
     * @param string $syid
     * @param array $options
     * @param Customer|null $customer
     *
     * @return GetMemberMcodeRequestModelInterface
     */
    public function convertCustomerToGetMemberMcodeRequest(string $aceCustomerId, string $syid, array $options = [], ?Customer $customer = null): GetMemberMcodeRequestModelInterface;

    /**
     * Convert EC-CUBE Customer to ACE UpdatePassword request
     *
     * @param Customer $customer
     * @param string $syid
     * @param array $options
     *
     * @return UpdatePasswordRequestModelInterface
     */
    public function convertCustomerToUpdatePasswordRequest(Customer $customer, string $syid, array $options = []): UpdatePasswordRequestModelInterface;

    /**
     * Convert ACE GetMember response to EC-CUBE Customer
     *
     * @param GetMember\LoginMemberModelInterface $aceCustomer
     * @param Customer|null $customer
     * @param array $options
     *
     * @return Customer
     */
    public function convertGetMemberToCustomer(GetMember\LoginMemberModelInterface $aceCustomer, ?Customer $customer = null, array $options = []): Customer;

    /**
     * Convert ACE GetMemberMcode response to EC-CUBE Customer
     *
     * @param LoginMemberModelInterface $loginMemberModel
     * @param Customer|null $customer
     * @param array $options
     *
     * @return Customer
     */
    public function convertGetMemberMcodeToCustomer(LoginMemberModelInterface $loginMemberModel, ?Customer $customer = null, array $options = []): Customer;

    /**
     * 顧客データをGetOrderListリクエストに変換する
     *
     * @param string $aceCustomerId
     * @param string $syid
     * @param int $page
     * @param int $limit
     * @param int|null $denno
     * @param int $sort
     *
     * @return \Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList\V1GetOrderListRequestModelInterface
     */
    public function convertCustomerToGetOrderListRequest(string $aceCustomerId, string $syid, int $page = 1, int $limit = 10, ?int $denno = null, int $sort = 0): \Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList\V1GetOrderListRequestModelInterface;

    /**
     * 顧客データをGetOrderListV2リクエストに変換する
     *
     * @param string $aceCustomerId
     * @param string $syid
     * @param int $page
     * @param int $limit
     * @param int|null $denno
     * @param int $sort
     * @param string|null $dayFrom
     * @param string|null $dayTo
     * @param array $options
     *
     * @return \Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2\V2GetOrderListV2RequestModelInterface
     */
    public function convertCustomerToGetOrderListV2Request(string $aceCustomerId, string $syid, int $page = 1, int $limit = 10, ?int $denno = null, int $sort = 0, ?string $dayFrom = null, ?string $dayTo = null, array $options = []): \Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2\V2GetOrderListV2RequestModelInterface;
}
