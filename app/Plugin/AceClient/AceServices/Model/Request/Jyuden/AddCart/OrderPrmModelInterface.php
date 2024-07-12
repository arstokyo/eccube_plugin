<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;

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
    public function setMember(?MemberOrderModelInterface $member): self;

    /**
     * Get 顧客情報
     * 
     * @return Request\Jyuden\AddCart\MemberOrderModel|null
     */
    public function getMember(): ?MemberOrderModelInterface;

    /**
     * Get オーダー情報
     * 
     * @return Request\Jyuden\AddCart\JyudenModelInterface|null
     */
    public function getJyuden(): ?JyudenModelInterface;

    /**
     * Set オーダー情報
     * 
     * @param Request\Jyuden\AddCart\JyudenModel|null $jyuden
     * @return self
     */
    public function setJyuden(?JyudenModelInterface $jyuden): self;

    /**
     * Get 詳細情報
     * 
     * @return Request\Jyuden\AddCart\DetailModelInterface|null
     */
    public function getDetail(): ?DetailModelInterface;

    /**
     * Set 詳細情報
     * 
     * @param Request\Jyuden\AddCart\DetailModel|null $detail
     * @return self
     */
    public function setDetail(?DetailModelInterface $detail): self;

    /**
     * Get Mail情報
     * 
     * @return Request\Jyuden\AddCart\MailJyudenModel|null
     */
    public function getMailjyuden(): ?MailJyudenModel;

    /**
     * Set Mail情報
     * 
     * @param Request\Jyuden\AddCart\MailJyudenModel|null $mailjyuden
     * @return self
     */
    public function setMailjyuden(?MailJyudenModel $mailjyuden): self;
    
}