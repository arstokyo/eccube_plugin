<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderModelInterface;

class OrderModel extends OrderModelAbstract implements OrderModelInterface
{
    
    /**
     * Set 顧客情報
     * 
     * @param Request\Jyuden\AddCart\MemberOrderModel $member
     * @return Request\Jyuden\AddCart\OrderModel
     */
    public function setMember(MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

}