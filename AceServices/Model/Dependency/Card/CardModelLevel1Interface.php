<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Card Level 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelLevel1Interface extends HasCnameInterface
{
     /**
     * Get カード番号
     * 
     * @return string|null
     */
    public function getCno(): ?string;

    /**
     * Set カード番号
     * 
     * @param string|null $cno
     * @return $this
     */
    public function setCno(string|null $cno): static;

    /**
     * Get カード会社コード
     * 
     * @return string|null
     */
    public function getCcode(): ?string;

    /**
     * Set カード会社コード
     * 
     * @param string|null $ccode
     * @return $this
     */
    public function setCcode(string|null $ccode): static;

    /**
     * Get カード有効期限
     * 
     * @return AceDateTime\AceDateTimeInterface|null
     */
    public function getCkigen(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set カード有効期限
     * 
     * @param \Datetime|string|null $ckigen
     * @return $this
     */
    public function setCkigen(\Datetime|string|null $ckigen): static;

    /**
     * Get カード支払方法
     * 
     * @return int|null
     */
    public function getCpay(): ?int;

    /**
     * Set カード支払方法
     * 
     * @param int|null $cpay
     * @return $this
     */
    public function setCpay(int|null $cpay): static;

    /**
     * Get カード支払回数
     * 
     * @return int|null
     */
    public function getKaisuu(): ?int;

    /**
     * Set カード支払回数
     * 
     * @param int|null $kaisuu
     * @return $this
     */
    public function setKaisuu(int|null $kaisuu): static;

    /**
     * Get カード承認番号
     * 
     * @return string|null
     */
    public function getSyounin(): ?string;

    /**
     * Set カード承認番号
     * 
     * @param string|null $syounin
     * @return $this
     */
    public function setSyounin(string|null $syounin): static;
}