<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Jmember\JmemberModelInterface as ParentInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel4ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel5ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

interface JmemberModelInterface extends ParentInterface, PersonLevel2ExtractInterface, PersonLevel4ExtractInterface, PersonLevel5ExtractInterface, PersonLevel6ExtractInterface, 
                                        HasThreeBikouInterface,
                                        Mail\HasMailInterface,
                                        PhoneAndPC\HasFaxInterface,
                                        NoCategory\HasPassWdInterface
{
   
}