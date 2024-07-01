<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC\MobileIdTrait;

/**
 * Class for Member Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use PersonLevel6ExtractTrait,
        FiveMelmagaTrait,
        MobileIdTrait;
}