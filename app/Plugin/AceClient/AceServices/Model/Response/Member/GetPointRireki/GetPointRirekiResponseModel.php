<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetPointRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPointRirekiResponseModel extends ResponseModelAbtract implements GetPointRirekiResponseModelInterface
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