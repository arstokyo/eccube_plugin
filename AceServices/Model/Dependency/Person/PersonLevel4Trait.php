<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for Person Level 4
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel4Trait 
{
    use Free\ThreeFreeTrait,
        Free\ThreeFdayTrait,
        Free\ThreeFmemoTrait,
        Free\ThreeFcodeTrait,
        Bikou\ThreeBikouTrait,
        Baitai\BaitaiCodeTrait,
        PhoneAndPC\FaxTrait,
        NoCategory\DmKbnTrait,
        Cost\RituTrait,
        Cost\Tanka\TankaKbnTrait,
        Denpyo\ToriKbnTrait;

    /** @var ?AceDateTime\AceDateTime $birthday 生年月日 */
    protected ?AceDateTime\AceDateTime $birthday = null;

    /** @var ?string $tel2 電話番号 */
    protected ?string $tel2 = null;

    /** @var ?string $upcode 紹介者 */
    protected ?string $upcode = null;

    /** @var ?int $inday 入会日 */
    protected ?int $inday = null;

    /** @var ?int $khasuu 掛率端数処理区分 */
    protected ?int $khasuu = null;

    /** @var ?int $sex 性別 */
    protected ?int $sex = null;

    /** @var ?int $sime 締日 */
    protected ?int $sime = null;

    /** @var ?int $site 入金サイト */
    protected ?int $site = null;

    /** @var ?string $code2 リスト番号 */
    protected ?string $code2 = null;

    /**
     * {@inheritDoc}
     */
    public function getBirthday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->birthday;
    }

    /**
     * {@inheritDoc}
     */
    public function setBirthday(\DateTime|string|null $birthday): static
    {
        $this->birthday = AceDateTime\AceDateTimeFactory::makeAceDateTime($birthday);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    /**
     * {@inheritDoc}
     */
    public function setTel2(?string $tel2): static
    {
        $this->tel2 = $tel2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUpcode(): ?string
    {
        return $this->upcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setUpcode(?string $upcode): static
    {
        $this->upcode = $upcode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getInday(): ?int
    {
        return $this->inday;
    }

    /**
     * {@inheritDoc}
     */
    public function setInday(?int $inday): static
    {
        $this->inday = $inday;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKhasuu(): ?int
    {
        return $this->khasuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKhasuu(?int $khasuu): static
    {
        $this->khasuu = $khasuu;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSex(): ?int
    {
        return $this->sex;
    }

    /**
     * {@inheritDoc}
     */
    public function setSex(?int $sex): static
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSime(): ?int
    {
        return $this->sime;
    }

    /**
     * {@inheritDoc}
     */
    public function setSime(?int $sime): static
    {
        $this->sime = $sime;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSite(): ?int
    {
        return $this->site;
    }

    /**
     * {@inheritDoc}
     */
    public function setSite(?int $site): static
    {
        $this->site = $site;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCode2(): ?string
    {
        return $this->code2;
    }

    /**
     * {@inheritDoc}
     */
    public function setCode2(?string $code2): static
    {
        $this->code2 = $code2;
        return $this;
    }

}