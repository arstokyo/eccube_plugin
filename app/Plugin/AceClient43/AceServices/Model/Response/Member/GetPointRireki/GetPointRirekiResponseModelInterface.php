<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetPointRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPointRirekiResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MemberModel
     *
     * @return Response\Member\GetPointRireki\MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set MemberModel
     *
     * @param Response\Member\GetPointRireki\MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}