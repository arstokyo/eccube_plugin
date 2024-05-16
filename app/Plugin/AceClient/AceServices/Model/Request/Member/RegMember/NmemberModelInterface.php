<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface as ParentInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

interface NMemberModelInterface extends ParentInterface, PersonLevel2ExtractInterface, 
                                        HasThreeBikouInterface, NoCategory\HasBetuInterface,
                                        PhoneAndPC\HasFaxInterface
{
   
}