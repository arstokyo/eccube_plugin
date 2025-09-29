<?php

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Cart;
use Eccube\Entity\Customer;

class CartControllerServicePreAddCart
{
    public array $options;

    public array $Carts;

    public Customer $customer;

    public Cart $currentCart;

    public function __construct(
        array $Carts,
        Cart $currentCart,
        Customer $customer,
        array $options,
    ) {
        $this->options = $options;
        $this->Carts = $Carts;
        $this->customer = $customer;
        $this->currentCart = $currentCart;
    }
}
