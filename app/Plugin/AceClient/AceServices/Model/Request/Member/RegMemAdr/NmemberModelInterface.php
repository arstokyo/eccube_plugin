<?php

namespace  Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface as ParentInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel2ExtractInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

interface NmemberModelInterface extends ParentInterface, PersonLevel2ExtractInterface, 
                                        HasThreeBikouInterface, NoCategory\HasBetuInterface,
                                        PhoneAndPC\HasFaxInterface
{
   
}