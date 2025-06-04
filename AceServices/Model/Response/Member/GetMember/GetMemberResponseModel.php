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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetMemberResponseModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetMemberResponseModel extends ResponseModelAbtract implements GetMemberResponseModelInterface
{
    /**
     * @var LoginMemberModelInterface
     */
    protected LoginMemberModelInterface $LoginMember;

    /**
     * {@inheritDoc}
     */
    public function getLoginMember(): LoginMemberModelInterface
    {
        return $this->LoginMember;
    }

    /**
     * {@inheritDoc}
     */
    public function setLoginMember(LoginMemberModel $loginMember): void
    {
        $this->LoginMember = $loginMember;
    }
}
