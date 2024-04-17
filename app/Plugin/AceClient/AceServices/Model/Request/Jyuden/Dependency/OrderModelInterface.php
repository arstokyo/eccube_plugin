<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\OrderModelRequestInterface;

interface OrderModelInterface extends OrderModelRequestInterface
{

    /**
     * Set 顧客情報
     * 
     * @param Jyuden\Dependency\MemberModelAbstract $member
     */
    public function setMember(MemberModelInterface $member);
    
}
