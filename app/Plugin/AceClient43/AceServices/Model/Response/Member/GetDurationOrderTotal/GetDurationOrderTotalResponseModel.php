<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal\MemberModelInterface;

/**
 * Class GetDurationOrderTotalResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDurationOrderTotalResponseModel extends ResponseModelAbtract implements GetDurationOrderTotalResponseModelInterface
{
    /**
     * @var MemberModel $mmember
     */
    protected MemberModel $member;

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberModelInterface
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