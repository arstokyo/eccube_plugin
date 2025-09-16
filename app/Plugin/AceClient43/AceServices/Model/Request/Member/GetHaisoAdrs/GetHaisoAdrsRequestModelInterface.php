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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface for Get Haiso Adrs Request Model
 *
 * @author k-morino
 */
interface GetHaisoAdrsRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasMcodeInterface
{
}
