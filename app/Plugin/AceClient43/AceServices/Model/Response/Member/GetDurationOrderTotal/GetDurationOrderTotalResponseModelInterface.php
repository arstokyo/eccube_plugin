<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal\MemberModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetDurationOrderTotalResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetDurationOrderTotalResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Member
     *
     * @return Response\Member\GetDurationOrderTotal\MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set Member
     *
     * @param Response\Member\GetDurationOrderTotal\MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}