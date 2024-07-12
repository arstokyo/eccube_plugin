<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Person Level 4
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface PersonLevel4Interface extends Free\HasThreeFreeInterface, Baitai\HasBaitaiCodeInterface,
                                        Free\HasThreeFdayInterface, Free\HasThreeFmemoInterface,
                                        Free\HasThreeFcodeInterface, Denpyo\HasToriKbnInterface,
                                        PhoneAndPC\HasFaxInterface, Bikou\HasThreeBikouInterface,
                                        NoCategory\HasDmKbnInterface, Cost\HasRituInterface,
                                        Cost\Tanka\HasTankaKbnInterface 
{
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
     * @return $this
     */
    public function setTel2(?string $tel2);
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
     * @return $this
     */
    public function setCode2(?string $code2);

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
     * @return $this
     */
    public function setSex(?int $sex);
    /**
     * Get 生年月日.
     *
     * @return AceDateTimeInterface|null
     */
    public function getBirthday();
    /**
     * Set 生年月日.
     *
     * @param \DateTime|string|null $birthday
     * @return $this
     */
    public function setBirthday($birthday);
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
     * @return $this
     */
    public function setUpcode(?string $upcode);
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
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setInday(?int $inday);
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
     * @return $this
     */
    public function setKhasuu(?int $khasuu);

}