<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

interface CheckDuplicationMemberRequestModelInterface extends RequestModelInterface,
                                                              NoCategory\HasSyidInterface
{
    /**
     * Set 顧客情報
     *
     * @param Request\Member\CheckDuplicationMember\MemberPrmModel $prm
     * @return self
     */
    public function setPrm(MemberPrmModel $prm): self;

    /**
     * Get 顧客情報
     *
     * @return Request\Member\CheckDuplicationMember\MemberPrmModel
     */
    public function getPrm(): MemberPrmModelInterface;
}
