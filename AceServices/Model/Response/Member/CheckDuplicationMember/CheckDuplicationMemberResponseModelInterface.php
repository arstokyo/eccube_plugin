<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for CheckDuplicationMemberResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface CheckDuplicationMemberResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Member
     *
     * @return MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set Member
     *
     * @param MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}
