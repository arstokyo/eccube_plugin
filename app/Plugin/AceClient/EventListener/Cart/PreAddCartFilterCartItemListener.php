<?php

namespace Plugin\AceClient43\EventListener\Cart;

use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PreAddCartFilterCartItemEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PreAddCartFilterCartItemListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            Events::PRE_ADD_CART_FILTER_CART_ITEM => 'onFilter',
        ];
    }

    public function onFilter(PreAddCartFilterCartItemEvent $event): void
    {
        // Filter out present items
        foreach ($event->filteredCartItems as $cartItem) {
            if ($cartItem->isPresent()) {
                $event->removeCartItem($cartItem);
            }
        }

        // If all items are filtered out, sync the cart and skip
        if (empty($event->getFilteredCartItems())) {
            log_info('[PreAddCartFilterCartItem] フィルタされたカートアイテムが空のため、カートを同期してaddCart処理をスキップします。');

            // This will remove items from cart and set shouldSkip to true
            $event->syncCartIfEmpty();
        }
    }
}
