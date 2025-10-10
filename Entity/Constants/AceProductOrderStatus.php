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

class AceProductOrderStatus
{
    /**
     * 通常
     *
     * @var int
     */
    public const NORMAL = 0;

    /**
     * 中止
     *
     * @var int
     */
    public const SUSPENDED = 10;

    /**
     * 終了
     *
     * @var int
     */
    public const ABOLISHED = 99;
}
