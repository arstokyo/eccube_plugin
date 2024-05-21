<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\Jmember\JmemberModelInterface as ParentInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;

interface JmemberModelInterface extends PersonLevel6ExtractInterface, 
                                        Mail\HasMailInterface,
                                        NoCategory\HasPassWdInterface
{
   
}