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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Class for GoodModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModelGroup1 implements GoodModelGroup1Interface
{
    use Bikou\ThreeNotesTrait;

    use GoodModelBaseTrait;

    use GdidTrait;

    /** @var ?int 納品明細出力区分 */
    protected ?int $nprint = null;

    /** @var ?string 規格1 */
    protected ?string $kikaku1 = null;

    /** @var ?string 規格2 */
    protected ?string $kikaku2 = null;

    /** @var ?float 梱包数 */
    protected ?float $konpo = null;

    /** @var ?int 削除フラグ */
    protected ?int $delfg = null;

    /** @var ?int 定期区分 */
    protected ?int $teiki = null;

    /** @var ?int 直送区分 */
    protected ?int $tyoku = null;

    /** @var ?int 個人販売数 */
    protected ?int $kgsuu = null;

    /** @var ?int 全体販売数 */
    protected ?int $zgsuu = null;

    /** @var ?AceDateTime\AceDateTime 個人販売数開始日時 */
    protected ?AceDateTime\AceDateTime $kgdate = null;

    /** @var ?AceDateTime\AceDateTime 全体販売数開始日時 */
    protected ?AceDateTime\AceDateTime $zgdate = null;

    /** @var ?int 在庫確保数 */
    protected ?int $keepsuu = null;

    /** @var ?string 品番ID */
    protected ?string $ghid = null;

    /** @var ?string 品番フリガナ */
    protected ?string $kana1 = null;

    /** @var ?string 名称 */
    protected ?string $name1 = null;

    /** @var ?string 略名称 */
    protected ?string $subnm1 = null;

    /**
     * {@inheritDoc}
     */
    public function getNprint(): ?int
    {
        return $this->nprint;
    }

    /**
     * {@inheritDoc}
     */
    public function setNprint(?int $nprint)
    {
        $this->nprint = $nprint;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKikaku1(): ?string
    {
        return $this->kikaku1;
    }

    /**
     * {@inheritDoc}
     */
    public function setKikaku1(?string $kikaku1)
    {
        $this->kikaku1 = $kikaku1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKikaku2(): ?string
    {
        return $this->kikaku2;
    }

    /**
     * {@inheritDoc}
     */
    public function setKikaku2(?string $kikaku2)
    {
        $this->kikaku2 = $kikaku2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKonpo(): ?float
    {
        return $this->konpo;
    }

    /**
     * {@inheritDoc}
     */
    public function setKonpo(?string $konpo)
    {
        $this->konpo = NumberConverter::stringWithCommaToFloat($konpo);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDelfg(): ?int
    {
        return $this->delfg;
    }

    /**
     * {@inheritDoc}
     */
    public function setDelfg(?int $delfg)
    {
        $this->delfg = $delfg;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTeiki(): ?int
    {
        return $this->teiki;
    }

    /**
     * {@inheritDoc}
     */
    public function setTeiki(?int $teiki)
    {
        $this->teiki = $teiki;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTyoku(): ?int
    {
        return $this->tyoku;
    }

    /**
     * {@inheritDoc}
     */
    public function setTyoku(?int $tyoku)
    {
        $this->tyoku = $tyoku;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKgsuu(): ?int
    {
        return $this->kgsuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKgsuu(?int $kgsuu)
    {
        $this->kgsuu = $kgsuu;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getZgsuu(): ?int
    {
        return $this->zgsuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setZgsuu(?int $zgsuu)
    {
        $this->zgsuu = $zgsuu;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKgdate()
    {
        return $this->kgdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setKgdate($kgdate)
    {
        $this->kgdate = AceDateTime\AceDateTimeFactory::makeAceDateTime($kgdate);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getZgdate()
    {
        return $this->zgdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setZgdate($zgdate)
    {
        $this->zgdate = AceDateTime\AceDateTimeFactory::makeAceDateTime($zgdate);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKeepsuu(): ?int
    {
        return $this->keepsuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeepsuu(?int $keepsuu)
    {
        $this->keepsuu = $keepsuu;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGhid(): ?string
    {
        return $this->ghid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGhid(?string $ghid)
    {
        $this->ghid = $ghid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKana1(): ?string
    {
        return $this->kana1;
    }

    /**
     * {@inheritDoc}
     */
    public function setKana1(?string $kana1)
    {
        $this->kana1 = $kana1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName1(): ?string
    {
        return $this->name1;
    }

    /**
     * {@inheritDoc}
     */
    public function setName1(?string $name1)
    {
        $this->name1 = $name1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubnm1(): ?string
    {
        return $this->subnm1;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubnm1(?string $subnm1)
    {
        $this->subnm1 = $subnm1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isSoftDelete(): bool
    {
        return $this->getDelfg() === 1;
    }
}
