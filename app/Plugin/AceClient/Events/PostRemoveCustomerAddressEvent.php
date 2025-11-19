<?php

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\DeleteHaisoAdrsResponseModel;

class PostRemoveCustomerAddressEvent
{
    public CustomerAddress $customerAddress;

    public Customer $customer;

    public DeleteHaisoAdrsResponseModel $deleteHaisoAdrsResponseModel;

    public function __construct(CustomerAddress $customerAddress, Customer $customer, DeleteHaisoAdrsResponseModel $deleteHaisoAdrsResponseModel)
    {
        $this->customerAddress = $customerAddress;
        $this->customer = $customer;
        $this->deleteHaisoAdrsResponseModel = $deleteHaisoAdrsResponseModel;
    }
}
