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

namespace Plugin\AceClient43\AceServices\Model\Request\Master2\GetHaisouDayTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetHaisouDayTime Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHaisouDayTimeRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, Souko\HasSoukoInterface, Haiso\HasHcodeInterface, Address\HasZipInterface
{
}
