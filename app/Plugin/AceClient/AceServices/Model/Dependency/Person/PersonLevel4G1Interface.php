<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFreeInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFDayInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFMemoInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFCodeInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai\HasBaitaiCodeInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasMemmailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFNameInterface;

/**
 * Interface for PersonLevel4 Group 1
 * 
 * @target : /Member/Service2.asmx/regMember|smember
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface PersonLevel4G1Interface extends HasThreeFreeInterface, HasBaitaiCodeInterface, 
                                          HasThreeFDayInterface, HasThreeFMemoInterface,
                                          HasThreeFCodeInterface, HasMemmailInterface,
                                          HasThreeFNameInterface
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
     * @return self
     */
    public function setFax(?string $fax): self;

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
     * @return self
     */
    public function setTel2(?string $tel2): self;

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
     * @return self
     */
    public function setDmkb(?int $dmkb): self;

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
     * @return self
     */
    public function setCode2(?string $code2): self;

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
     * @return self
     */
    public function setTankakbn(?int $tankakbn): self;

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
     * @return self
     */
    public function setSex(?int $sex): self;

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
     * @return self
     */
    public function setBirthday(?int $birthday): self;

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
     * @return self
     */
    public function setUpcode(?string $upcode): self;

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
     * @return self
     */
    public function setTorikbn(?int $torikbn): self;

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
     * @return self
     */
    public function setSime(?int $sime): self;

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
     * @return self
     */
    public function setSite(?int $site): self;

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
     * @return self
     */
    public function setInday(?int $inday): self;

    /**
     * Get 掛け率.
     *
     * @return int|null 
     */
    public function getRitu(): ?int;

    /**
     * Set 掛け率.
     *
     * @param int|null $ritu 
     * @return self
     */
    public function setRitu(?int $ritu): self;

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
     * @return self
     */
    public function setKhasuu(?int $khasuu): self;

}   
