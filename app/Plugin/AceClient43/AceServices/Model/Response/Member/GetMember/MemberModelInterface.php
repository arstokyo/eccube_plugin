<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasFiveMelmagaInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC\HasMobileIdInterface;

/**
 * Interface MemberModelInterface
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MemberModelInterface extends PersonLevel6ExtractInterface, HasFiveMelmagaInterface,
                                       HasMobileIdInterface
{

}