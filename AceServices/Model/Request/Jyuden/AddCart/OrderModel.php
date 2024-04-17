<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderModelInterface;

class OrderModel extends OrderModelAbstract implements OrderModelInterface
{
    
    /**
     * Set 顧客情報
     * 
     * @param Jyuden\Dependency\MemberModelInterface $member
     * @return Jyuden\AddCart\OrderModel
     */
    public function setMember(MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

}