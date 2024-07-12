<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

use Eccube\Entity\PointTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;
use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Class for GoodModelGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModelGroup2 implements GoodModelGroup2Interface
{
    use GoodModelBaseTrait,
        NoCategory\TwoImagesTrait,
        Cost\Tanka\NineTankaTrait,
        Free\ThreeFcodeTrait,
        Free\ThreeFnameTrait,
        Free\ThreeFmemoTrait,
        Free\ThreeFdayTrait,
        Free\ThreeFreeTrait,
        Cost\Tax\TaxKbnTrait,
        ReizouTrait,
        ReitouTrait,
        JyouonTrait,
        GcodeTrait,
        Point\PointTrait,
        Zaiko\ZaikoTrait;

    /** @var ?string $dbun 大分類コード */
    protected ?string $dbun = null;

    /** @var ?string $dbunname 大分類コード名称 */
    protected ?string $dbunname = null;

    /** @var ?string $tbun 中分類コード */
    protected ?string $tbun = null;

    /** @var ?string $tbunname 中分類コード名称 */
    protected ?string $tbunname = null;

    /** @var ?string $sbun 小分類コード */
    protected ?string $sbun = null;

    /** @var ?string $sbunname 小分類コード名称 */
    protected ?string $sbunname = null;

    /** @var ?string $bikou 備考 */
    protected ?string $bikou = null;

    /** @var ?string $tanano 棚番号 */
    protected ?string $tanano = null;

    /** @var ?int $kakuho 確保数 */
    protected ?int $kakuho = null;

    /** @var ?int $konpo 梱包数 */
    protected ?int $konpo = null;

    /** @var ?int $otaxkbn 掛売顧客税 */
    protected ?int $otaxkbn = null;

    /** @var ?int $sougakuhkbn 総額端数 */
    protected ?int $sougakuhkbn = null;

    /** @var ?int $pointkake ポイント掛率対象区分 */
    protected ?int $pointkake = null;

    /**
     * {@inheritDoc}
     */
    public function getDbun(): ?string
    {
        return $this->dbun;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbun(?string $dbun)
    {
        $this->dbun = $dbun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbunname(): ?string
    {
        return $this->dbunname;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbunname(?string $dbunname)
    {
        $this->dbunname = $dbunname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTbun(): ?string
    {
        return $this->tbun;
    }

    /**
     * {@inheritDoc}
     */
    public function setTbun(?string $tbun)
    {
        $this->tbun = $tbun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTbunname(): ?string
    {
        return $this->tbunname;
    }

    /**
     * {@inheritDoc}
     */
    public function setTbunname(?string $tbunname)
    {
        $this->tbunname = $tbunname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSbun(): ?string
    {
        return $this->sbun;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbun(?string $sbun)
    {
        $this->sbun = $sbun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSbunname(): ?string
    {
        return $this->sbunname;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbunname(?string $sbunname)
    {
        $this->sbunname = $sbunname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBikou(): ?string
    {
        return $this->bikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setBikou(?string $bikou)
    {
        $this->bikou = $bikou;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTanano(): ?string
    {
        return $this->tanano;
    }

    /**
     * {@inheritDoc}
     */
    public function setTanano(?string $tanano)
    {
        $this->tanano = $tanano;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKakuho(): ?int
    {
        return $this->kakuho;
    }

    /**
     * {@inheritDoc}
     */
    public function setKakuho(?int $kakuho)
    {
        $this->kakuho = $kakuho;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKonpo(): ?int
    {
        return $this->konpo;
    }

    /**
     * {@inheritDoc}
     */
    public function setKonpo(?int $konpo)
    {
        $this->konpo = $konpo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOtaxkbn(): ?int
    {
        return $this->otaxkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtaxkbn(?int $otaxkbn)
    {
        $this->otaxkbn = $otaxkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSougakuhkbn(): ?int
    {
        return $this->sougakuhkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSougakuhkbn(?int $sougakuhkbn)
    {
        $this->sougakuhkbn = $sougakuhkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPointkake(): ?int
    {
        return $this->pointkake;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointkake(?int $pointkake)
    {
        $this->pointkake = $pointkake;
        return $this;
    }
}