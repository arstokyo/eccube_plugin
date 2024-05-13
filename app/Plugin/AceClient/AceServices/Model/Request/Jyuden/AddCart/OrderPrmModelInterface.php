<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Interface for オーダー情報
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */ 
interface OrderPrmModelInterface extends PrmModelInterface
{ 

    /**
     * Set 顧客情報
     * 
     * @param Request\Jyuden\AddCart\MemberOrderModel $member
     * @return self
     */
    public function setMember(MemberOrderModelInterface $member): self;

    /**
     * Get 顧客情報
     * 
     * @return Request\Jyuden\AddCart\MemberOrderModel
     */
    public function getMember(): MemberOrderModelInterface;
}