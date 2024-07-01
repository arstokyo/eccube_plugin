<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMember;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetMemberResponseModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetMemberResponseModel extends ResponseModelAbtract implements GetMemberResponseModelInterface
{
    /**
     * @var LoginMemberModelInterface $LoginMember
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