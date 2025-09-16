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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\BetuTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelGroup1;

/**
 * Nmem Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemModel extends NmemberModelGroup1 implements NmemModelInterface
{
    use BetuTrait;
}
