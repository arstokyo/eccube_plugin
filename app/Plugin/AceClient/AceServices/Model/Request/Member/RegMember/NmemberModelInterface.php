<?php

namespace  Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface as ParentInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

interface NmemberModelInterface extends ParentInterface, 
                                        Person\PersonLevel2ExtractInterface, 
                                        Bikou\HasThreeBikouInterface
{
   
}