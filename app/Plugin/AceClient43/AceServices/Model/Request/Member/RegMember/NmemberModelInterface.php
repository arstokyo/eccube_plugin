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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface as ParentInterface;

interface NmemberModelInterface extends ParentInterface, Person\PersonLevel2ExtractInterface, Bikou\HasThreeBikouInterface
{
}
