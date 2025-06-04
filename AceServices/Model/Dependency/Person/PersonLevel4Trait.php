<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for Person Level 4
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel4Trait
{
    use Free\ThreeFreeTrait;
    use Free\ThreeFdayTrait;
    use Free\ThreeFmemoTrait;
    use Free\ThreeFcodeTrait;
    use Bikou\ThreeBikouTrait;
    use Baitai\BaitaiCodeTrait;
    use PhoneAndPC\FaxTrait;
    use NoCategory\DmKbnTrait;
    use Cost\RituTrait;
    use Cost\Tanka\TankaKbnTrait;
    use Denpyo\ToriKbnTrait;

    /** @var ?AceDateTime\AceDateTime 生年月日 */
    protected ?AceDateTime\AceDateTime $birthday = null;

    /** @var ?string 電話番号 */
    protected ?string $tel2 = null;

    /** @var ?string 紹介者 */
    protected ?string $upcode = null;

    /** @var ?int 入会日 */
    protected ?int $inday = null;

    /** @var ?int 掛率端数処理区分 */
    protected ?int $khasuu = null;

    /** @var ?int 性別 */
    protected ?int $sex = null;

    /** @var ?int 締日 */
    protected ?int $sime = null;

    /** @var ?int 入金サイト */
    protected ?int $site = null;

    /** @var ?string リスト番号 */
    protected ?string $code2 = null;

    /**
     * {@inheritDoc}
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * {@inheritDoc}
     */
    public function setBirthday($birthday)
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
    public function setTel2(?string $tel2)
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
    public function setUpcode(?string $upcode)
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
    public function setInday(?int $inday)
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
    public function setKhasuu(?int $khasuu)
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
    public function setSex(?int $sex)
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
    public function setSime(?int $sime)
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
    public function setSite(?int $site)
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
    public function setCode2(?string $code2)
    {
        $this->code2 = $code2;

        return $this;
    }
}
