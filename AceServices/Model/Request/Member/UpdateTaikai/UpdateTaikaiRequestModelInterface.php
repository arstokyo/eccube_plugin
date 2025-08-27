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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface UpdateTaikai Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdateTaikaiRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasMcodeInterface, NoCategory\HasTaikaiInterface
{
    /**
     * 退会フラグ: 入会中
     */
    public const TAIKAI_ACTIVE = '0';

    /**
     * 退会フラグ: 退会済
     */
    public const TAIKAI_WITHDRAWN = '1';

    /**
     * 退会フラグ: 非会員
     */
    public const TAIKAI_NON_MEMBER = '2';
}
