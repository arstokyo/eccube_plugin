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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetHaisoAdrsRequestModel
 *
 * @author kmorino
 */
class GetHaisoAdrsResponseModel extends ResponseModelAbtract implements GetHaisoAdrsResponseModelInterface
{
    /**
     * Member
     *
     * @var MemberModel
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\getHaisoAdrs\MemberModel
     */
    public function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
     * @param Response\Member\getHaisoAdrs\MemberModel $member
     */
    public function setMember(MemberModel $member): self
    {
        $this->member = $member;

        return $this;
    }
}
