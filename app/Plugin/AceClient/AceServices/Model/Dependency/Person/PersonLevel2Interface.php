<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Interface For PersonLevel1a Group1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel2Interface 
{
    /**
     * Get 氏名
     * 
     */
    public function getSimei(): ?string;

    /**
     * Set 氏名
     * 
     * @param ?string $simei
     */
    public function setSimei(?string $simei);

    /**
     * Get フリガナ
     * 
     */
    public function getKana(): ?string;

    /**
     * Set フリガナ
     * 
     * @param ?string $kana
     */
    public function setKana(?string $kana);

    /**
     * Get 郵便番号
     * 
     */
    public function getZip(): ?string;

    /**
     * Set 郵便番号
     * 
     * @param ?string $zip
     */
    public function setZip(?string $zip);

    /**
     * Get 電話番号
     * 
     */
    public function getTel(): ?string;

    /**
     * Set 電話番号
     * 
     * @param ?string $tel
     */
    public function setTel(?string $tel);

    /**
     * Get 住所1
     * 
     */
    public function getAdr1(): ?string;

    /**
     * Set 住所1
     * 
     * @param ?string $adr1
     */
    public function setAdr1(?string $adr1);

    /**
     * Get 住所2
     * 
     */
    public function getAdr2(): ?string;

    /**
     * Set 住所2
     * 
     * @param ?string $adr2
     */
    public function setAdr2(?string $adr2);

    /**
     * Get 住所3
     * 
     */
    public function getAdr3(): ?string;

    /**
     * Set 住所3
     * 
     * @param ?string $adr3
     */
    public function setAdr3(?string $adr3);

    /**
     * Get 住所4
     * 
     */
    public function getAdr4(): ?string;

    /**
     * Set 住所4
     * 
     * @param ?string $adr4
     */
    public function setAdr4(?string $adr4);
}