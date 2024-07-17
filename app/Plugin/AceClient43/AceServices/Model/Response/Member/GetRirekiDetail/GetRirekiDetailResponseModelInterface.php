<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRirekiDetail;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetRirekiDetailResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetRirekiDetailResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MemberModel
     *
     * @return Response\Member\GetRirekiDetail\MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set MemberModel
     *
     * @param Response\Member\GetRirekiDetail\MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}