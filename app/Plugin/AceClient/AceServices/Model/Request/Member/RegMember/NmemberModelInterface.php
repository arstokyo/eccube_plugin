<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface as ParentInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

interface NmemberModelInterface extends ParentInterface, 
                                        Person\PersonLevel2ExtractInterface, 
                                        Bikou\HasThreeBikouInterface
{
   
}