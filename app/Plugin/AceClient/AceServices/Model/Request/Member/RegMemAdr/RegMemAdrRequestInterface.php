<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Interface RegMemAdrRequestInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface RegMemAdrRequestInterface extends RequestModelInterface
{
   /**
    * Get SystemID
    *
    * @return int
    */
    public function getId(): int;

    /**
     * Set SystemID
     *
     * @param int $id
     * @return self
     */
    public function setId(int $id): self;

    /**
     * Get 顧客住所　情報
     *
     * @return string|null|object
     */
    public function getPrm(): string|null|object;

    /**
     * Set 顧客住所　情報
     *
     * @param Request\Member\RegMemAdr\MemberPrmInterface $prm
     * @return self
     */
    public function setPrm(MemberPrmInterface $prm): self;

}