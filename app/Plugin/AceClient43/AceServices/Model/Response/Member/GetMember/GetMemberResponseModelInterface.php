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

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for Get Member Reponse Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface GetMemberResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Login Member
     *
     * @return LoginMemberModelInterface
     */
    public function getLoginMember(): LoginMemberModelInterface;

    /**
     * Set Login Member
     *
     * @param LoginMemberModel $loginMember
     */
    public function setLoginMember(LoginMemberModel $loginMember): void;
}
