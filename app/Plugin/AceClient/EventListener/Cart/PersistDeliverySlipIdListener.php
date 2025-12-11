<?php

namespace Plugin\AceClient43\EventListener\Cart;

use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostAddCartEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PersistDeliverySlipIdListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            Events::POST_ADD_CART => 'onPostAddCart',
        ];
    }

    public function onPostAddCart(PostAddCartEvent $event): void
    {
        if ($splitId = $event->getAddCartResponseModel()->getOrder()->getJyuden()->getHcode()) {
            $event->getCart()->setAceDeliverySlipId($splitId);
        }
    }
}
