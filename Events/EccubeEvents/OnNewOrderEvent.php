<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Events\EccubeEvents;

use Eccube\Entity\Cart;
use Eccube\Entity\Customer;
use Eccube\Entity\Order;
use Symfony\Contracts\EventDispatcher\Event;

class OnNewOrderEvent extends Event
{
    private Order $order;

    private Cart $cart;

    private Customer $customer;

    public function __construct(Order $order, Cart $cart, Customer $customer)
    {
        $this->order = $order;
        $this->cart = $cart;
        $this->customer = $customer;
    }

    /**
     * 受注を取得します.
     *
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * カートを取得します.
     *
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * 顧客を取得します.
     *
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
