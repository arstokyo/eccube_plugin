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

class AceDeliveryType
{
    /**
     * 宅配便
     *
     * @var int
     */
    public const COURIER_SERVICE = 0;

    /**
     * 代引
     *
     * @var int
     */
    public const CASH_ON_DELIVERY = 1;

    /**
     * 郵便･DM便
     *
     * @var int
     */
    public const POST_DM = 2;
}
