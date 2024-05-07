<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

/*
 * Class for RegMemAdrResponseModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class RegMemAdrResponseModel implements RegMemAdrResponseModelInterface
{
    /** @var MemberModel $member */
    private MemberModel $member;

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}
