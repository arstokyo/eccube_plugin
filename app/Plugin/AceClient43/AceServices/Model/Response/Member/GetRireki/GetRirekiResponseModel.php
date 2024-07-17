<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetRirekiResponseModel extends ResponseModelAbtract implements GetRirekiResponseModelInterface
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