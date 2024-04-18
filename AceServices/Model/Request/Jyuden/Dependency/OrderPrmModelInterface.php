<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PrmModelRequestInterface;

interface OrderPrmModelInterface extends PrmModelRequestInterface
{
    /**
     * Set 顧客情報
     * 
     * @param Request\Jyuden\Dependency\MemberModelAbstract $member
     * @return Request\Jyuden\Dependency\OrderPrmModelInterface
     */
    public function setMember(MemberModelInterface $member): self;

    /**
     * Get 顧客情報
     * 
     * @return Request\Jyuden\Dependency\MemberModelAbstract
     */
    public function getMember(): MemberModelAbstract;
    
}