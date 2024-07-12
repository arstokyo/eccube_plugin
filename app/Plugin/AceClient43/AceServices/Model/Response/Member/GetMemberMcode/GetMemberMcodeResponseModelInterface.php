<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetMemberMcode Reponse Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberMcodeResponseModelInterface extends ResponseModelInterface
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