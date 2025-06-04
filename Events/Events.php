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

namespace App\Plugin\AceClient43\Events;

class Events
{
    public const PRE_REGISTER_CUSTOMER = 'ace_client.pre_register_customer';
    public const POST_REGISTER_CUSTOMER = 'ace_client.post_register_customer';
    public const PRE_UPDATE_CUSTOMER = 'ace_client.pre_update_customer';
    public const POST_UPDATE_CUSTOMER = 'ace_client.post_update_customer';
    public const ON_GET_AND_UPDATE_CUSTOMER = 'ace_client.on_get_and_update_customer';
    public const PRE_CREATE_OR_UPDATE_CUSTOMER_ADDRESS = 'ace_client.pre_create_or_update_customer_address';
    public const POST_CREATE_OR_UPDATE_CUSTOMER_ADDRESS = 'ace_client.post_create_or_update_customer_address';
}
