<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModel as ParentModel;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel2ExtractTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

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