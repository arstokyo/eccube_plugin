<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Class for GoodModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModelGroup1 implements GoodModelGroup1Interface
{
    use Bikou\ThreeNotesTrait, GoodModelBaseTrait, GdidTrait;

    /** @var ?string $gdid 商品ID */
    protected ?string $gdid = null;

    /** @var ?int $nprint 納品明細出力区分 */
    protected ?int $nprint = null;

    /** @var ?string $kikaku1 規格1 */
    protected ?string $kikaku1 = null;

    /** @var ?string $kikaku2 規格2 */
    protected ?string $kikaku2 = null;

    /** @var ?float $konpo 梱包数 */
    protected ?float $konpo = null;

    /** @var ?int $delfg 削除フラグ */
    protected ?int $delfg = null;

    /** @var ?int $teiki 定期区分 */
    protected ?int $teiki = null;

    /** @var ?int $tyoku 直送区分 */
    protected ?int $tyoku = null;

    /** @var ?int $kgsuu 個人販売数 */
    protected ?int $kgsuu = null;

    /** @var ?int $zgsuu 全体販売数 */
    protected ?int $zgsuu = null;

    /** @var ?AceDateTime\AceDateTime $kgdate 個人販売数開始日時 */
    protected ?AceDateTime\AceDateTime $kgdate = null;

    /** @var ?AceDateTime\AceDateTime $zgdate 全体販売数開始日時 */
    protected ?AceDateTime\AceDateTime $zgdate = null;

    /** @var ?int $keepsuu 在庫確保数 */
    protected ?int $keepsuu = null;

    /** @var ?string $ghid 品番ID */
    protected ?string $ghid = null;

    /** @var ?string $kana1 品番フリガナ */
    protected ?string $kana1 = null;

    /** @var ?string $name1 名称 */
    protected ?string $name1 = null;

    /** @var ?string $subnm1 略名称 */
    protected ?string $subnm1 = null;

    /**
     * {@inheritDoc}
     */
    public function getGdid(): ?string
    {
        return $this->gdid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGdid(?string $gdid): static
    {
        $this->gdid = $gdid;
        return $this;
    }

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
    public function setNprint(?int $nprint): static
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
    public function setKikaku1(?string $kikaku1): static
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
    public function setKikaku2(?string $kikaku2): static
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
    public function setKonpo(string|null $konpo): static
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
    public function setDelfg(?int $delfg): static
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
    public function setTeiki(?int $teiki): static
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
    public function setTyoku(?int $tyoku): static
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
    public function setKgsuu(?int $kgsuu): static
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
    public function setZgsuu(?int $zgsuu): static
    {
        $this->zgsuu = $zgsuu;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKgdate(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->kgdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setKgdate(\DateTime|string|null $kgdate): static
    {
        $this->kgdate = AceDateTime\AceDateTimeFactory::makeAceDateTime($kgdate);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getZgdate(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->zgdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setZgdate(\DateTime|string|null $zgdate): static
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
    public function setKeepsuu(?int $keepsuu): static
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
    public function setGhid(?string $ghid): static
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
    public function setKana1(?string $kana1): static
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
    public function setName1(?string $name1): static
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
    public function setSubnm1(?string $subnm1): static
    {
        $this->subnm1 = $subnm1;
        return $this;
    }
}