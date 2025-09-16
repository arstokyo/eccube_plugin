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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface as ParentInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel2ExtractInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

interface NmemberModelInterface extends ParentInterface, PersonLevel2ExtractInterface, HasThreeBikouInterface, NoCategory\HasBetuInterface, PhoneAndPC\HasFaxInterface
{
}
