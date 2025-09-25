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

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetFreeCdWithName;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetHoliday Request Model
 *
 * @author Ars-Phuoc <v.t.nguyen@ar-system.co.jp>
 */
interface GetFreeCdWithNameRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasCodeInterface
{
}
