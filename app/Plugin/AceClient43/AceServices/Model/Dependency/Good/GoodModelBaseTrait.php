<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for GoodModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GoodModelBaseTrait
{
    use GNameTrait,
        SubNameTrait,
        NoCategory\KanaTrait,
        GkbnTrait,
        Shukka\SKbnTrait;

    /** @var ?string $tani 単位 */
    protected ?string $tani = null;
    /** @var ?int $tkbn 中止区分 */
    protected ?int $tkbn = null;
    /** @var ?int $kake 掛率区分 */
    protected ?int $kake = null;
    /** @var ?int $zkbn 在庫区分 */
    protected ?int $zkbn = null;
    /** @var ?string $barcode バーコード */
    protected ?string $barcode = null;

    /**
     * {@inheritDoc}
     */
    public function getTani(): ?string
    {
        return $this->tani;
    }

    /**
     * {@inheritDoc}
     */
    public function setTani(?string $tani)
    {
        $this->tani =  $tani;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTkbn(): ?int
    {
        return $this->tkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTkbn(?int $tkbn)
    {
        $this->tkbn = $tkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKake(): ?int
    {
        return $this->kake;
    }

    /**
     * {@inheritDoc}
     */
    public function setKake(?int $kake)
    {
        $this->kake = $kake;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getZkbn(): ?int
    {
        return $this->zkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setZkbn(?int $zkbn)
    {
        $this->zkbn = $zkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setBarcode(?string $barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }
}