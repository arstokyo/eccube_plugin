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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasFiveMelmagaInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC\HasMobileIdInterface;

/**
 * Interface MemberModelInterface
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MemberModelInterface extends PersonLevel6ExtractInterface, HasFiveMelmagaInterface, HasMobileIdInterface
{
}
