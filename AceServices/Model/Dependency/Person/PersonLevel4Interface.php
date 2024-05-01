<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFreeInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFdayInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFmemoInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFcodeInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai\HasBaitaiCodeInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasMemmailInterface;

/**
 * Interface for Person Level 4
 * 
 * @target : /Member/Service2.asmx/regMember|request-smember|request-jmem
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface PersonLevel4Interface extends HasThreeFreeInterface, HasBaitaiCodeInterface, 
                                        HasThreeFdayInterface, HasThreeFmemoInterface,
                                        HasThreeFcodeInterface, HasMemmailInterface
{
    /**
     * Get fax.
     *
     * @return ?string 
     */
    public function getFax(): ?string;

    /**
     * Set fax.
     *
     * @param string|null $fax 
     */
    public function setFax(?string $fax);

    /**
     * Get その他電話.
     *
     * @return string|null 
     */
    public function getTel2(): ?string;

    /**
     * Set その他電話.
     *
     * @param string|null $tel2 
     */
    public function setTel2(?string $tel2);

    /**
     * Get DM対象区分.
     *
     * @return int|null 
     */
    public function getDmkb(): ?int;

    /**
     * Set DM対象区分.
     *
     * @param int|null $dmkb 
     */
    public function setDmkb(?int $dmkb);

    /**
     * Get リスト番号.
     *
     * @return string|null 
     */
    public function getCode2(): ?string;

    /**
     * Set リスト番号.
     *
     * @param string|null $code2 
     */
    public function setCode2(?string $code2);

    /**
     * Get 単価種別.
     * 
     * @return int|null
     */
    public function getTankakbn(): ?int;

    /**
     * Set 単価種別.
     *
     * @param int|null $tankakbn 
     */
    public function setTankakbn(?int $tankakbn);

    /**
     * Get 性別.
     * 0:不明 1:男 2:女 3:法人
     *
     * @return int|null
     */
    public function getSex(): ?int;

    /**
     * Set 性別
     * 0:不明 1:男 2:女 3:法人
     *
     * @param int|null $sex
     */
    public function setSex(?int $sex);

    /**
     * Get 生年月日.
     *
     * @return int|null
     */
    public function getBirthday(): ?int;

    /**
     * Set 生年月日.
     *
     * @param int|null $birthday
     */
    public function setBirthday(?int $birthday);

    /**
     * Get 紹介者.
     *
     * @return string|null 
     */
    public function getUpcode(): ?string;

    /**
     * Set 紹介者.
     *
     * @param string|null $upcode 
     */
    public function setUpcode(?string $upcode);

    /**
     * Get 取引区分.
     *
     * @return int|null 
     */
    public function getTorikbn(): ?int;

    /**
     * Set 取引区分.
     *
     * @param int|null $torikbn 
     */
    public function setTorikbn(?int $torikbn);

    /**
     * Get 締め日.
     *
     * @return int|null 
     */
    public function getSime(): ?int;

    /**
     * Set 締め日.
     *
     * @param int|null $sime 
     */
    public function setSime(?int $sime);

    /**
     * Get 入金サイト.
     *
     * @return int|null 
     */
    public function getSite(): ?int;

    /**
     * Set 入金サイト.
     *
     * @param int|null $site 
     */
    public function setSite(?int $site);

    /**
     * Get 入金日.
     *
     * @return int|null 
     */
    public function getInday(): ?int;

    /**
     * Set 入金日.
     *
     * @param int|null $inday 
     */
    public function setInday(?int $inday);

    /**
     * Get 掛け率.
     *
     * @return float|null 
     */
    public function getRitu(): ?float;

    /**
     * Set 掛け率.
     *
     * @param float|null $ritu 
     */
    public function setRitu(?float $ritu);

    /**
     * Get 掛率端数処理区分.
     *
     * @return int|null 
     */
    public function getKhasuu(): ?int;

    /**
     * Set 掛率端数処理区分.
     *
     * @param int|null $khasuu 
     */
    public function setKhasuu(?int $khasuu);

}   
