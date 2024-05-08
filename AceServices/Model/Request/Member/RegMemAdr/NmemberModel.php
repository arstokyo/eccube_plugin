<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class for 納品先Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModel extends NmemberAbstract implements NmemberModelInterface
{
  use PersonLevel2ExtractTrait,
      ThreeBikouTrait,
      NoCategory\BetuTrait,
      NoCategory\FaxTrait;
   
}