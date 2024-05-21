<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Smember\SmemberModelInterface as ParentInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

interface SmemberModelInterface extends ParentInterface, PersonLevel6ExtractInterface, 
                                        HasThreeBikouInterface,
                                        Mail\HasMailInterface,
                                        PhoneAndPC\HasFaxInterface
{
   
}