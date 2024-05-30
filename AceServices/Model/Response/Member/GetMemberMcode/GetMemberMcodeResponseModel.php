<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetMemberMcodeResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetMemberMcodeResponseModel extends ResponseModelAbtract implements GetMemberMcodeResponseModelInterface
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
