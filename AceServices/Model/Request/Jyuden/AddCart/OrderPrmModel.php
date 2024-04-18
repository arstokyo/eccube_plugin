<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\OrderPrmModelInterface;

class OrderPrmModel extends OrderPrmModelAbstract implements OrderPrmModelInterface
{

    /**
     * Set 顧客情報
     * 
     * @param Request\Jyuden\Dependency\MemberModelAbstract $member
     * @return Request\Jyuden\AddCart\OrderPrmModel
     */
    public function setMember(MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

}