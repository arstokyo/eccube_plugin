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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class DeleteHaisoAdrsRequestModel
 *
 * @author kmorino
 */
class DeleteHaisoAdrsResponseModel extends ResponseModelAbtract implements DeleteHaisoAdrsResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel
     */
    protected MemberModel $member;

    /**
     * @return MemberModel
     */
    public function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
     * @param MemberModel $member
     */
    public function setMember(MemberModel $member): void
    {
        $this->member = $member;
    }
}
