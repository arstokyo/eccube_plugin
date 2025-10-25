<?php

namespace Plugin\AceClient43\Bridge\Helper;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\Bridge\DataConverter\CustomerAddressDataConverterInterface;

/**
 * 顧客住所ブリッジヘルパークラス
 *
 * @deprecated CustomerAddressBridgeHelperは廃止予定です。代わりにCustomerAddressBridgeを使用してください。
 */
class CustomerAddressBridgeHelper
{
    private CustomerAddressDataConverterInterface $customerAddressDataConverter;

    public function __construct(CustomerAddressDataConverterInterface $customerAddressDataConverter)
    {
        $this->customerAddressDataConverter = $customerAddressDataConverter;
    }

    /**
     * 顧客の住所を新規作成または更新するためのリクエストモデルを生成
     */
    public function createRegMemAdrRequestModel(CustomerAddress $address, string $syid, array $options = []): RegMemAdrRequestModel
    {
        return $this->customerAddressDataConverter->convertCustomerAddressToRegMemAdrRequest($address, $syid, $options);
    }

    /**
     * 顧客住所を削除するためのリクエストモデルを生成
     */
    public function createDeleteHaisoAdrsRequestModel(Customer $customer, CustomerAddress $address, string $syid, array $options = []): DeleteHaisoAdrsRequestModel
    {
        return $this->customerAddressDataConverter->convertCustomerAddressToDeleteRequest($customer, $address, $syid, $options);
    }
}
