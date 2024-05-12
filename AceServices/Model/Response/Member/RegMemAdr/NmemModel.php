<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember\NmemberModelGroup1;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\BetuTrait;

/**
 * Nmem Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemModel extends NmemberModelGroup1 implements NmemModelInterface
{
    use BetuTrait;
}