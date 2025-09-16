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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\BetuTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel3Trait;

/**
 * Class For Nmem Model Group2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModelGroup2 extends NmemberModelGroup1 implements NmemberModelGroup2Interface
{
    use PersonLevel3Trait;
    use BetuTrait;
}
