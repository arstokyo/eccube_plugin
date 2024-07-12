<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
    /**
     * Member
     *
     * @var Member1Model $member
     */
    protected ?Member1Model $member  = null;

    /**
     * {@inheritDoc}
     */
    function getMember(): ?Member1Model
    {
        return $this->member;
    }

    /**
    * {@inheritDoc}
    */
    function setMember(?Member1Model $member): void
    {
        $this->member = $member;
    }
}