<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Smember\SmemberModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class for 納品先Model
 * 
 * @author kmorino
 */
class SmemberModel extends ParentModel implements SmemberModelInterface
{
  use PersonLevel6ExtractTrait,
      ThreeBikouTrait,
      Mail\MemMailTrait,
      PhoneAndPC\FaxTrait;
      
}