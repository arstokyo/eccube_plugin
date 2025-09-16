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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Jyuden Model Group3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyudenModelGroup3Interface extends JyudenModelGroup2Interface, NoCategory\HasSessIdInterface, Denpyo\HasMemIdInterface
{
}
