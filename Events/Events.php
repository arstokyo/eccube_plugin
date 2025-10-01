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

namespace Plugin\AceClient43\Events;

class Events
{
    public const PRE_REGISTER_CUSTOMER = 'ace_client.pre_register_customer';
    public const POST_REGISTER_CUSTOMER = 'ace_client.post_register_customer';
    public const PRE_UPDATE_CUSTOMER = 'ace_client.pre_update_customer';
    public const POST_UPDATE_CUSTOMER = 'ace_client.post_update_customer';
    public const ON_GET_AND_UPDATE_CUSTOMER = 'ace_client.on_get_and_update_customer';
    public const PRE_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS = 'ace_client.pre_create_or_update_in_ace_customer_address';
    public const POST_CREATE_OR_UPDATE_IN_ACE_CUSTOMER_ADDRESS = 'ace_client.post_create_or_update_in_ace_customer_address';
    public const PRE_ADD_CART = 'ace_client.pre_add_cart';
    public const POST_ADD_CART = 'ace_client.post_add_cart';
    public const POST_EXECUTE_ADD_CART_REQUEST = 'ace_client.post_execute_add_cart_request';
    public const ON_PRE_CREATE_ORDER = 'ace_client.on_pre_create_order';
    public const POST_CREATE_ORDER = 'ace_client.post_create_order';
    public const PRE_PROCESS_CHARGE_EVENT = 'ace_client.pre_process_charge_event';
    public const POST_PROCESS_CHARGE_EVENT = 'ace_client.post_process_charge_event';
    public const COMMAND_PRE_IMPORT_PRODUCT = 'ace_client.command_pre_import_product';
    public const HELPER_PRE_IMPORT_PRODUCT = 'ace_client.helper_pre_import_product';
    public const HELPER_POST_IMPORT_PRODUCT = 'ace_client.helper_post_import_product';
    public const PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT = 'ace_client.product_import_helper_on_create_product';
    public const PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT_FAILED = 'ace_client.product_import_helper_on_create_product_failed';
    public const PRODUCT_IMPORT_HELPER_ON_SET_PRICE = 'ace_client.product_import_helper_on_set_price';
    public const PRE_ADD_CONTACT = 'ace_client.pre_add_contact';
    public const CART_CONTROLLER_SERVICE_PRE_ADD_CART = 'ace_client.cart_controller_service.pre_add_cart';
    public const ADD_CART_PRE_CREATE_REQUEST = 'ace_client.add_cart.pre_create_request';
    public const PRE_GET_ITEMS = 'ace_client.pre_get_items';
}
