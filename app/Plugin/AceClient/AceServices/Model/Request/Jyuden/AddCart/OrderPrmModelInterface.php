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
     * @param Request\Jyuden\AddCart\MemberOrderModel|null $member
     * @return self
     */
    public function setMember(MemberOrderModelInterface|null $member): self;

    /**
     * Get 顧客情報
     * 
     * @return Request\Jyuden\AddCart\MemberOrderModel|null
     */
    public function getMember(): MemberOrderModelInterface|null;

    /**
     * Get オーダー情報
     * 
     * @return Request\Jyuden\AddCart\JyudenModelInterface|null
     */
    public function getJyuden(): JyudenModelInterface|null;

    /**
     * Set オーダー情報
     * 
     * @param Request\Jyuden\AddCart\JyudenModel|null $jyuden
     * @return self
     */
    public function setJyuden(JyudenModelInterface|null $jyuden): self;

    /**
     * Get 詳細情報
     * 
     * @return Request\Jyuden\AddCart\DetailModelInterface|null
     */
    public function getDetail(): DetailModelInterface|null;

    /**
     * Set 詳細情報
     * 
     * @param Request\Jyuden\AddCart\DetailModel|null $detail
     * @return self
     */
    public function setDetail(DetailModelInterface|null $detail): self;

    /**
     * Get Mail情報
     * 
     * @return Request\Jyuden\AddCart\MailJyudenModel|null
     */
    public function getMailjyuden(): MailJyudenModel|null;

    /**
     * Set Mail情報
     * 
     * @param Request\Jyuden\AddCart\MailJyudenModel|null $mailjyuden
     * @return self
     */
    public function setMailjyuden(MailJyudenModel|null $mailjyuden): self;
    
}