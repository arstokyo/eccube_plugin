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

class AceProductType
{
    /**
     * 通常商品
     *
     * @var int
     */
    public const PRODUCT = 0;

    /**
     * 配送料金
     *
     * @var int
     */
    public const DELIVERY_FEE = 1;

    /**
     * 手数料
     *
     * @var int
     */
    public const CHARGE_FEE = 2;

    /**
     * 割引
     *
     * @var int
     */
    public const DISCOUNT = 3;
}
