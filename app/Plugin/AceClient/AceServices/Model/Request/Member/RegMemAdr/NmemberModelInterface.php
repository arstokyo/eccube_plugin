<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2ExtractInterface;

interface NmemberModelInterface extends NmemberInterface, PersonLevel2ExtractInterface, 
                                        HasThreeBikouInterface, NoCategory\HasBetuInterface,
                                        NoCategory\HasFaxInterface
{
   
}