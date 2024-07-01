<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * @return Response\Member\GetMember\LoginMemberModelInterface
     */
    public function getLoginMember(): LoginMemberModelInterface;

    /**
     * Set Login Member
     * 
     * @param Response\Member\GetMember\LoginMemberModel $loginMember
     */
    public function setLoginMember(LoginMemberModel $loginMember): void;
}