<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember\NmemberModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class for 納品先Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModel extends ParentModel implements NmemberModelInterface
{
  use PersonLevel2ExtractTrait,
      ThreeBikouTrait,
      NoCategory\BetuTrait,
      PhoneAndPC\FaxTrait;
   
}