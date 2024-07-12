<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC\MobileIdTrait;

/**
 * Class for Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use PersonLevel6ExtractTrait,
        FiveMelmagaTrait,
        MobileIdTrait;
}