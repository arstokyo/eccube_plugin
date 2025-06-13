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

class Events
{
    public const ON_CART_ADD_PRODUCT = 'eccube.on_cart_add_product';
    public const ON_NEW_CART = 'eccube.on_new_cart';
    public const ON_NEW_ORDER = 'eccube.on_new_order';
    public const ON_NEW_ORDER_ITEM_FROM_CART_ITEM = 'eccube.on_new_order_item_from_cart_item';
    public const ON_COMPARE_CART_ITEM_PRODUCT_CLASS = 'eccube.on_compare_cart_item_product_class';
    public const ON_NEW_SHIPPING_FROM_CUSTOMER = 'eccube.on_new_shipping_from_customer';
    public const ON_EDIT_CUSTOMER_DELIVERY = 'eccube.on_edit_customer_delivery';
}
