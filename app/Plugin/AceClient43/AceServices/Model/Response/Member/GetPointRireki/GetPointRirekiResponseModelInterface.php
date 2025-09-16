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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

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
     * @return MemberModelInterface
     */
    public function getMember(): MemberModelInterface;

    /**
     * Set MemberModel
     *
     * @param MemberModel $member
     */
    public function setMember(MemberModel $member): void;
}
