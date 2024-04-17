<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden;

class OrderModelAbstract extends OrderModelRequestAbstract implements OrderModelInterface
{

    /** @var Jyuden\Dependency\MemberModelInterface $member 顧客情報*/
    protected MemberModelInterface $member;

    /**
     * Set 顧客情報
     * 
     * @param Jyuden\Dependency\MemberModelAbstract $member
     * @return Jyuden\Dependency\OrderModelAbstract
     */
    public function setMember(MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }
}