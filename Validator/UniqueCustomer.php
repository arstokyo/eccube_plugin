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

namespace Plugin\AceClient43\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueCustomer extends Constraint
{
    public const TRANS_ADMIN_DOMAIN = 'ace_client.admin_customer_unique';

    public const TRANS_FRONT_DOMAIN = 'ace_client.front_customer_unique';

    public string $translationDomain = UniqueCustomer::TRANS_FRONT_DOMAIN;

    public function validatedBy(): string
    {
        return static::class.'Validator';
    }
}
