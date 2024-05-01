<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Address\HasFourAdrInterface;

/**
 * Interface For PersonLevel1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel2Interface extends HasFourAdrInterface
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

}