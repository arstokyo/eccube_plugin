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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetDurationOrderTotalResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDurationOrderTotalResponseModel extends ResponseModelAbtract implements GetDurationOrderTotalResponseModelInterface
{
    /**
     * @var MemberModel
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
