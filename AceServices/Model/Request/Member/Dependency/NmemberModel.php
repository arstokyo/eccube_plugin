<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel1Trait;

/**
 * Class for NmemberModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModel extends NmemberAbstract implements NmemberModelInterface
{
   use PersonLevel1Trait;
}