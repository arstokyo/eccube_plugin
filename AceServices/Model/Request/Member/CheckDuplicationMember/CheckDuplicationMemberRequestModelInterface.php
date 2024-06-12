<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

interface CheckDuplicationMemberRequestModelInterface extends RequestModelInterface
{
    /**
     * Get 通販AceID
     *
     * @return ?int
     */
    public function getSyid(): ?int;

    /**
     * Set 通販AceID
     *
     * @param ?int $syid
     * @return $this
     */
    public function setSyid(?int $syid): static;

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
