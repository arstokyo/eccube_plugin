<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetRirekiDetail;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetRirekiDetailResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetRirekiDetailResponseModel extends ResponseModelAbtract implements GetRirekiDetailResponseModelInterface
{
    /**
     * @var MemberModelInterface $Member
     */
    protected MemberModelInterface $Member;

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberModelInterface
    {
        return $this->Member;
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(MemberModel $member): void
    {
        $this->Member = $member;
    }

}