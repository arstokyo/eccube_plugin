<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface MemberModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface MemberModelInterface extends HasMessageModelInterface
{
    /**
    * Get Member
    *
    * @return ?Member1Model
    */
    public function getMember(): ?Member1Model;

    /**
     * Set Member
     *
     * @param ?Member1Model $member
     * @return void
     */
    public function setMember(?Member1Model $member): void;
}