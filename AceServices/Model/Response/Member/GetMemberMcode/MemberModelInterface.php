<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasFiveMelmagaInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC\HasMobileIdInterface;

/**
 * Interface MemberModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends PersonLevel6ExtractInterface, HasFiveMelmagaInterface,
                                       HasMobileIdInterface
{

}