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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/*
 * Class for RegMemberResponseModel
 *
 * @author kmorino
 */
class RegMemberResponseModel extends ResponseModelAbtract implements RegMemberResponseModelInterface
{
    /** @var MemberModel */
    private MemberModel $member;

    /**
     * {@inheritDoc}
     */
    public function getMember(): MemberModel
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
