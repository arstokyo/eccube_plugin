<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\Free\HasFiveForderMailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasFiveFshukkaMailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasFiveFseikyuMailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasFiveFshouHinMailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasFiveFdenshiMailInterface;

/**
 * Interface For HasFreeGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeGroup1Interface extends HasFiveForderMailInterface,
                                        HasFiveFshukkaMailInterface,
                                        HasFiveFseikyuMailInterface,
                                        HasFiveFshouHinMailInterface,
                                        HasFiveFdenshiMailInterface
{
    /**
     * Get 紹介者顧客メモ
     *
     * @return ?string
     */
    public function getFreeshokaishamemo(): ?string;

    /**
     * Set 紹介者顧客メモ
     *
     * @param ?string $freeshokaishamemo
     * @return $this
     */
    public function setFreeshokaishamemo(?string $freeshokaishamemo): static;

    /**
     * Get 移行元
     *
     * @return ?int
     */
    public function getFreeikomoto(): ?int;

    /**
     * Set 移行元
     *
     * @param ?int $freeikomoto
     * @return $this
     */
    public function setFreeikomoto(?int $freeikomoto): static;

    /**
     * Get 代表者姓
     *
     * @return ?string
     */
    public function getFreedaihyoshasei(): ?string;

    /**
     * Set 代表者姓
     *
     * @param ?string $freedaihyoshasei
     * @return $this
     */
    public function setFreedaihyoshasei(?string $freedaihyoshasei): static;

    /**
     * Get 代表者名
     *
     * @return ?string
     */
    public function getFreedaihyoshamei(): ?string;

    /**
     * Set 代表者名
     *
     * @param ?string $freedaihyoshamei
     * @return $this
     */
    public function setFreedaihyoshamei(?string $freedaihyoshamei): static;

    /**
     * Get 代表者姓カナ
     *
     * @return ?string
     */
    public function getFreedaihyoshaseifuri(): ?string;

    /**
     * Set 代表者姓カナ
     *
     * @param ?string $freedaihyoshaseifuri
     * @return $this
     */
    public function setFreedaihyoshaseifuri(?string $freedaihyoshaseifuri): static;

    /**
     * Get 代表者名カナ
     *
     * @return ?string
     */
    public function getFreedaihyoshameifuri(): ?string;

    /**
     * Set 代表者名カナ
     *
     * @param ?string $freedaihyoshameifuri
     * @return $this
     */
    public function setFreedaihyoshameifuri(?string $freedaihyoshameifuri): static;

    /**
     * Get 代表者郵便番号
     *
     * @return ?string
     */
    public function getFreeyubinbango(): ?string;

    /**
     * Set 代表者郵便番号
     *
     * @param ?string $freeyubinbango
     * @return $this
     */
    public function setFreeyubinbango(?string $freeyubinbango): static;

    /**
     * Get 代表者都道府県
     *
     * @return ?string
     */
    public function getFreetodofuken(): ?string;

    /**
     * Set 代表者都道府県
     *
     * @param ?string $freetodofuken
     * @return $this
     */
    public function setFreetodofuken(?string $freetodofuken): static;

    /**
     * Get 代表者市区町村
     *
     * @return ?string
     */
    public function getFreeshikuchouson(): ?string;

    /**
     * Set 代表者市区町村
     *
     * @param ?string $freeshikuchouson
     * @return $this
     */
    public function setFreeshikuchouson(?string $freeshikuchouson): static;

    /**
     * Get 代表者町名番地
     *
     * @return ?string
     */
    public function getFreechomeibanchi(): ?string;

    /**
     * Set 代表者町名番地
     *
     * @param ?string $freechomeibanchi
     * @return $this
     */
    public function setFreechomeibanchi(?string $freechomeibanchi): static;

    /**
     * Get 代表者建物名
     *
     * @return ?string
     */
    public function getFreetatemonomei(): ?string;

    /**
     * Set 代表者建物名
     *
     * @param ?string $freetatemonomei
     * @return $this
     */
    public function setFreetatemonomei(?string $freetatemonomei): static;

    /**
     * Get 代表者会社名
     *
     * @return ?string
     */
    public function getFreekaishamei(): ?string;

    /**
     * Set 代表者会社名
     *
     * @param ?string $freekaishamei
     * @return $this
     */
    public function setFreekaishamei(?string $freekaishamei): static;

    /**
     * Get 代表者お届先名称
     *
     * @return ?string
     */
    public function getFreetodokesaki(): ?string;

    /**
     * Set 代表者お届先名称
     *
     * @param ?string $freetodokesaki
     * @return $this
     */
    public function setFreetodokesaki(?string $freetodokesaki): static;

    /**
     * Get 代表者電話番号1
     *
     * @return ?string
     */
    public function getFreedenwabango1(): ?string;

    /**
     * Set 代表者電話番号1
     *
     * @param ?string $freedenwabango1
     * @return $this
     */
    public function setFreedenwabango1(?string $freedenwabango1): static;

    /**
     * Get 代表者電話番号2
     *
     * @return ?string
     */
    public function getFreedenwabango2(): ?string;

    /**
     * Set 代表者電話番号2
     *
     * @param ?string $freedenwabango2
     * @return $this
     */
    public function setFreedenwabango2(?string $freedenwabango2): static;

    /**
     * Get 代表者電話番号3
     *
     * @return ?string
     */
    public function getFreedenwabango3(): ?string;

    /**
     * Set 代表者電話番号3
     *
     * @param ?string $freedenwabango3
     * @return $this
     */
    public function setFreedenwabango3(?string $freedenwabango3): static;

    /**
     * Get 代表者FAX番号
     *
     * @return ?string
     */
    public function getFreefax(): ?string;

    /**
     * Set 代表者FAX番号
     *
     * @param ?string $freefax
     * @return $this
     */
    public function setFreefax(?string $freefax): static;

    /**
     * Get 定休日
     *
     * @return ?string
     */
    public function getFreeteikyubi(): ?string;

    /**
     * Set 定休日
     *
     * @param ?string $freeteikyubi
     * @return $this
     */
    public function setFreeteikyubi(?string $freeteikyubi): static;

    /**
     * Get DM送付後説明
     *
     * @return ?int
     */
    public function getFreedmsofukbn(): ?int;

    /**
     * Set DM送付後説明
     *
     * @param ?int $freedmsofukbn
     * @return $this
     */
    public function setFreedmsofukbn(?int $freedmsofukbn): static;

    /**
     * Get ｴﾝﾄﾞﾕｰｻﾞｰ店舗案内
     *
     * @return ?int
     */
    public function getFreeenduserkbn(): ?int;

    /**
     * Set ｴﾝﾄﾞﾕｰｻﾞｰ店舗案内
     *
     * @param ?int $freeenduserkbn
     * @return $this
     */
    public function setFreeenduserkbn(?int $freeenduserkbn): static;

    /**
     * Get 反社チェック
     *
     * @return ?int
     */
    public function getFreehanshakbn(): ?int;

    /**
     * Set 反社チェック
     *
     * @param ?int $freehanshakbn
     * @return $this
     */
    public function setFreehanshakbn(?int $freehanshakbn): static;

    /**
     * Get 取引区分
     *
     * @return ?int
     */
    public function getThflg(): ?int;

    /**
     * Set 取引区分
     *
     * @param ?int $thflg
     * @return $this
     */
    public function setThflg(?int $thflg): static;
}