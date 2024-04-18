<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestAbstract;

class OrderModelAbstract extends OrderModelRequestAbstract implements OrderModelInterface
{

    /** @var Request\Jyuden\Dependency\MemberModelInterface $member 顧客情報*/
    protected MemberModelInterface $member;

    /**
     * Set 顧客情報
     * 
     * @param Request\Jyuden\Dependency\MemberModelAbstract $member
     * @return Request\Jyuden\Dependency\OrderModelAbstract
     */
    public function setMember(MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

    /**
     * Get 顧客情報
     * 
     * @return Request\Jyuden\Dependency\MemberModelAbstract
     */
    public function getMember(): MemberModelAbstract
    {
        return $this->member;
    }
}