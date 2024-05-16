<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Jmember\JmemberModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel4ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel5ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class for 納品先Model
 * 
 * @author kmorino
 */
class JmemberModel extends ParentModel implements JmemberModelInterface
{
  use PersonLevel2ExtractTrait,
      PersonLevel4ExtractTrait,
      PersonLevel5ExtractTrait,
      PersonLevel6ExtractTrait,
      ThreeBikouTrait,
      Mail\MemMailTrait,
      PhoneAndPC\FaxTrait,
      NoCategory\PassWdTrait;
}