<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Interface Member Order Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MemberOrderModelInterface
{
    
     /**
     * Set 受注先顧客情報
     * 
     * @param Request\Jyuden\AddCart\JmemberModel|null $jmember
     * @return self
     */
    public function setJmember(?Person\Jmember\JmemberModelInterface $jmember): self;

    /**
     * Get 受注先顧客情報
     * 
     * @return Request\Jyuden\AddCart\JmemberModel|null
     */
    public function getJmember(): ?Person\Jmember\JmemberModelInterface;

    /**
     * Set 納品先顧客情報
     * 
     * @param Request\Jyuden\AddCart\NmemberModel|null $nmember
     * @return self
     */
    public function setNmember(?Person\Nmember\NmemberModelInterface $nmember): self;

    /**
     * Get 納品先顧客情報
     * 
     * @return Request\Jyuden\AddCart\NmemberModel|null
     */
    public function getNmember(): ?Person\Nmember\NmemberModelInterface;

    /**
     * Set 請求先顧客情報
     * 
     * @param Request\Jyuden\AddCart\SmemberModel|null $smember
     * @return self
     */
    public function setSmember(?Person\Smember\SmemberModelInterface $smember): self;

    /**
     * Get 請求先顧客情報
     * 
     * @return Request\Jyuden\AddCart\SmemberModel|null
     */
    public function getSmember(): ?Person\Smember\SmemberModelInterface;

}