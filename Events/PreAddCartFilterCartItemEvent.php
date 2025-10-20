<?php

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Service\CartService;
use Plugin\AceClient43\Entity\Config;
use Symfony\Contracts\EventDispatcher\Event;

class PreAddCartFilterCartItemEvent extends Event
{
    public Cart $cart;

    public Config $config;

    public array $options;

    public array $filteredCartItems;

    public bool $shouldSkip = false;

    public array $removedCartItems = [];

    private CartService $cartService;

    public function __construct(Cart $cart, Config $config, array $options, CartService $cartService)
    {
        $this->cart = $cart;
        $this->config = $config;
        $this->options = $options;
        $this->filteredCartItems = $cart->getCartItems()->toArray();
        $this->cartService = $cartService;
    }

    /**
     * Remove a cart item from the filtered list
     */
    public function removeCartItem(CartItem $cartItem): void
    {
        $key = array_search($cartItem, $this->filteredCartItems, true);
        if ($key !== false) {
            unset($this->filteredCartItems[$key]);
            $this->removedCartItems[] = $cartItem;
        }
    }

    /**
     * Get the filtered cart items
     */
    public function getFilteredCartItems(): array
    {
        return array_values($this->filteredCartItems);
    }

    /**
     * Set the filtered cart items
     */
    public function setFilteredCartItems(array $filteredCartItems): void
    {
        $this->filteredCartItems = $filteredCartItems;
    }

    /**
     * Get removed cart items
     */
    public function getRemovedCartItems(): array
    {
        return $this->removedCartItems;
    }

    /**
     * Sync cart by removing filtered items when no items remain
     */
    public function syncCartIfEmpty(): void
    {
        if (empty($this->getFilteredCartItems()) && !empty($this->removedCartItems)) {
            log_info('[PreAddCartFilterCartItem] カートアイテムが全てフィルタされたため、カートを同期します。');

            // Only remove present items and unpurchasable items from cart
            // Keep unpurchasable items in the cart for UI display
            foreach ($this->removedCartItems as $cartItem) {
                if ($cartItem->isPresent()) {
                    $options = array_merge($this->options,[
                        'cart_item_data' => $cartItem,
                        'skip_restore_cart' => true
                    ]);
                    $this->cartService->removeProduct($cartItem->getProductClass(), $options);
                }
                // Do not remove unpurchasable items from cart - they should remain for UI
            }

            // Mark that we should skip the ace request
            $this->shouldSkip = true;
        }
    }
}
