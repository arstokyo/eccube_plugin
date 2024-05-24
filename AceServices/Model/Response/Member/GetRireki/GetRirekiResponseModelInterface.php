<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for GetRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetRirekiResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get MemberModel
     *
     * @return Response\Member\GetRireki\MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set MemberModel
     *
     * @param Response\Member\GetRireki\MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}