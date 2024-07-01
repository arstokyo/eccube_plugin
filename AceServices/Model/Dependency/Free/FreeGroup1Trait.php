<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\Free\FiveForderMailTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Free\FiveFshukkaMailTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Free\FiveFseikyuMailTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Free\FiveFshouHinMailTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Free\FiveFdenshiMailTrait;
/**
 * Trait For FreeGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeGroup1Trait
{
    use FiveFseikyuMailTrait, FiveFshouHinMailTrait, FiveFdenshiMailTrait, FiveForderMailTrait, FiveFshukkaMailTrait;

    /** @var ?string $freeshokaishamemo 紹介者顧客メモ */
    protected ?string $freeshokaishamemo = null;
    /** @var ?int $freeikomoto 移行元 */
    protected ?int $freeikomoto = null;
    /** @var ?string $freedaihyoshasei 代表者姓 */
    protected ?string $freedaihyoshasei = null;
    /** @var ?string $freedaihyoshamei 代表者名 */
    protected ?string $freedaihyoshamei = null;
    /** @var ?string $freedaihyoshaseifuri 代表者姓カナ */
    protected ?string $freedaihyoshaseifuri = null;
    /** @var ?string $freedaihyoshameifuri 代表者名カナ */
    protected ?string $freedaihyoshameifuri = null;
    /** @var ?string $freeyubinbango 代表者郵便番号 */
    protected ?string $freeyubinbango = null;
    /** @var ?string $freetodofuken 代表者都道府県 */
    protected ?string $freetodofuken = null;
    /** @var ?string $freeshikuchouson 代表者市区町村 */
    protected ?string $freeshikuchouson = null;
    /** @var ?string $freechomeibanchi 代表者町名番地 */
    protected ?string $freechomeibanchi = null;
    /** @var ?string $freetatemonomei 代表者建物名 */
    protected ?string $freetatemonomei = null;
    /** @var ?string $freekaishamei 代表者会社名 */
    protected ?string $freekaishamei = null;
    /** @var ?string $freetodokesaki 代表者お届先名称 */
    protected ?string $freetodokesaki = null;
    /** @var ?string $freedenwabango1 代表者電話番号1 */
    protected ?string $freedenwabango1 = null;
    /** @var ?string $freedenwabango2 代表者電話番号2 */
    protected ?string $freedenwabango2 = null;
    /** @var ?string $freedenwabango3 代表者電話番号3 */
    protected ?string $freedenwabango3 = null;
    /** @var ?string $freefax 代表者FAX番号 */
    protected ?string $freefax = null;
    /** @var ?string $freeteikyubi 定休日 */
    protected ?string $freeteikyubi = null;
    /** @var ?int $freedmsofukbn DM送付後説明 */
    protected ?int $freedmsofukbn = null;
    /** @var ?int $freeenduserkbn ｴﾝﾄﾞﾕｰｻﾞｰ店舗案内 */
    protected ?int $freeenduserkbn = null;
    /** @var ?int $freehanshakbn 反社チェック */
    protected ?int $freehanshakbn = null;
    /** @var ?int $thflg 取引区分 */
    protected ?int $thflg = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeshokaishamemo(): ?string
    {
        return $this->freeshokaishamemo;
    }
    /**
    * {@inheritDoc}
    */
    public function setFreeshokaishamemo(?string $freeshokaishamemo): static
    {
        $this->freeshokaishamemo = $freeshokaishamemo;
        return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getFreeikomoto(): ?int
    {
        return $this->freeikomoto;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeikomoto(?int $freeikomoto): static
    {
        $this->freeikomoto = $freeikomoto;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedaihyoshasei(): ?string
    {
        return $this->freedaihyoshasei;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedaihyoshasei(?string $freedaihyoshasei): static
    {
        $this->freedaihyoshasei = $freedaihyoshasei;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedaihyoshamei(): ?string
    {
        return $this->freedaihyoshamei;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedaihyoshamei(?string $freedaihyoshamei): static
    {
        $this->freedaihyoshamei = $freedaihyoshamei;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedaihyoshaseifuri(): ?string
    {
        return $this->freedaihyoshaseifuri;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedaihyoshaseifuri(?string $freedaihyoshaseifuri): static
    {
        $this->freedaihyoshaseifuri = $freedaihyoshaseifuri;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedaihyoshameifuri(): ?string
    {
        return $this->freedaihyoshameifuri;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedaihyoshameifuri(?string $freedaihyoshameifuri): static
    {
        $this->freedaihyoshameifuri = $freedaihyoshameifuri;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeyubinbango(): ?string
    {
        return $this->freeyubinbango;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeyubinbango(?string $freeyubinbango): static
    {
        $this->freeyubinbango = $freeyubinbango;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreetodofuken(): ?string
    {
        return $this->freetodofuken;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreetodofuken(?string $freetodofuken): static
    {
        $this->freetodofuken = $freetodofuken;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeshikuchouson(): ?string
    {
        return $this->freeshikuchouson;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeshikuchouson(?string $freeshikuchouson): static
    {
        $this->freeshikuchouson = $freeshikuchouson;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreechomeibanchi(): ?string
    {
        return $this->freechomeibanchi;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreechomeibanchi(?string $freechomeibanchi): static
    {
        $this->freechomeibanchi = $freechomeibanchi;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreetatemonomei(): ?string
    {
        return $this->freetatemonomei;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreetatemonomei(?string $freetatemonomei): static
    {
        $this->freetatemonomei = $freetatemonomei;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreekaishamei(): ?string
    {
        return $this->freekaishamei;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreekaishamei(?string $freekaishamei): static
    {
        $this->freekaishamei = $freekaishamei;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreetodokesaki(): ?string
    {
        return $this->freetodokesaki;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreetodokesaki(?string $freetodokesaki): static
    {
        $this->freetodokesaki = $freetodokesaki;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedenwabango1(): ?string
    {
        return $this->freedenwabango1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedenwabango1(?string $freedenwabango1): static
    {
        $this->freedenwabango1 = $freedenwabango1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedenwabango2(): ?string
    {
        return $this->freedenwabango2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedenwabango2(?string $freedenwabango2): static
    {
        $this->freedenwabango2 = $freedenwabango2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedenwabango3(): ?string
    {
        return $this->freedenwabango3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedenwabango3(?string $freedenwabango3): static
    {
        $this->freedenwabango3 = $freedenwabango3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreefax(): ?string
    {
        return $this->freefax;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreefax(?string $freefax): static
    {
        $this->freefax = $freefax;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeteikyubi(): ?string
    {
        return $this->freeteikyubi;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeteikyubi(?string $freeteikyubi): static
    {
        $this->freeteikyubi = $freeteikyubi;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedmsofukbn(): ?int
    {
        return $this->freedmsofukbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedmsofukbn(?int $freedmsofukbn): static
    {
        $this->freedmsofukbn = $freedmsofukbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeenduserkbn(): ?int
    {
        return $this->freeenduserkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeenduserkbn(?int $freeenduserkbn): static
    {
        $this->freeenduserkbn = $freeenduserkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreehanshakbn(): ?int
    {
        return $this->freehanshakbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreehanshakbn(?int $freehanshakbn): static
    {
        $this->freehanshakbn = $freehanshakbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getThflg(): ?int
    {
        return $this->thflg;
    }

    /**
     * {@inheritDoc}
     */
    public function setThflg(?int $thflg): static
    {
        $this->thflg = $thflg;
        return $this;
    }
}