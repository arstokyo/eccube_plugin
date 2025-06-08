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

namespace Plugin\AceClient43\Entity\Constants;

class TransactionType
{
    /**
     * Single payment (都度払い)
     *
     * @var int
     */
    public const SINGLE_PAYMENT = 0;

    /**
     * Credit payment / Pay later (掛け払い)
     *
     * @var int
     */
    public const CREDIT_PAYMENT = 1;

    /**
     * Card payment (カード払い)
     *
     * @var int
     */
    public const CARD_PAYMENT = 9;
}
