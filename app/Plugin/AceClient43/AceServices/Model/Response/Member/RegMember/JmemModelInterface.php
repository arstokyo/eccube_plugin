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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasFiveMelmagaInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;

/**
 * Interface for Jmem Model
 *
 * @author kmorino
 */
interface JmemModelInterface extends PersonLevel6ExtractInterface, HasFiveMelmagaInterface
{
}
