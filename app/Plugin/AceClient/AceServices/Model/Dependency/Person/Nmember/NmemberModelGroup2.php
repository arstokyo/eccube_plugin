<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel3Trait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\BetuTrait;

/**
 * Class For Nmem Model Group2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModelGroup2 extends NmemberModelGroup1 implements NmemberModelGroup2Interface
{
    use PersonLevel3Trait,
        BetuTrait;
}