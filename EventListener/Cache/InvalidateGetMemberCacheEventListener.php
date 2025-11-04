<?php

namespace Plugin\AceClient43\EventListener\Cache;

use Plugin\AceClient43\Cache\ResponseCachePool;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostCreateOrderEvent;
use Plugin\AceClient43\Events\PostCreateOrUpdateInAceCustomerAddressEvent;
use Plugin\AceClient43\Events\PostRegisterCustomerEvent;
use Plugin\AceClient43\Events\PostRemoveCustomerAddressEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class InvalidateGetMemberCacheEventListener implements EventSubscriberInterface
{
    private ResponseCachePool $responseCachePool;

    public function __construct(
        ResponseCachePool $responseCachePool,
    ) {
        $this->responseCachePool = $responseCachePool;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::POST_CREATE_ORDER => 'onPostCreateOrder',
            Events::POST_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS => 'onPostCreateOrUpdateInAceCustomerAddress',
            Events::POST_UPDATE_CUSTOMER => 'onPostUpdateCustomer',
            Events::POST_REMOVE_CUSTOMER_ADDRESS => 'onPostRemoveCustomerAddress',
        ];
    }

    public function onPostCreateOrder(PostCreateOrderEvent $event): void
    {
        $customer = $event->getShipping()->getOrder()->getCustomer();

        $this->doRemoveCache($customer->getAceCustomerId());
    }

    public function onPostCreateOrUpdateInAceCustomerAddress(PostCreateOrUpdateInAceCustomerAddressEvent $event): void
    {
        $customer = $event->getCustomerAddress()->getCustomer();

        $this->doRemoveCache($customer->getAceCustomerId());
    }

    public function onPostUpdateCustomer(PostRegisterCustomerEvent $event): void
    {
        $customer = $event->getCustomer();

        $this->doRemoveCache($customer->getAceCustomerId());
    }

    public function onPostRemoveCustomerAddress(PostRemoveCustomerAddressEvent $event): void
    {
        $customer = $event->customer;

        $this->doRemoveCache($customer->getAceCustomerId());
    }

    private function doRemoveCache(string $aceCustomerId): void
    {
        $this->responseCachePool->removeCacheByPrefix('get_by_ace_customer_id_'.$aceCustomerId);
    }
}
