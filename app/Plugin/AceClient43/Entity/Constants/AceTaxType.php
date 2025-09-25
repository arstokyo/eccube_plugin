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

class AceTaxType
{
    /**
     * 税抜
     *
     * @var int
     */
    public const TAX_EXCLUDED = 0;

    /**
     * 税込
     *
     * @var int
     */
    public const TAX_INCLUDED = 1;

    /**
     * 非課税
     *
     * @var int
     */
    public const TAX_EXEMPT = 2;

    /**
     * 単価依存
     *
     * @var int
     */
    public const DEPENDS_ON_UNIT_PRICE = 2;
}
