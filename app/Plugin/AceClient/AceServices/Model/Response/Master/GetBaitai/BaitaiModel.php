<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetBaitai;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Class BaitaiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class BaitaiModel implements BaitaiModelInterface
{
    use NoCategory\NameTrait,
        Good\SubNameTrait,
        NoCategory\CodeTrait;

    /** @var ?string $bun 分類コード */
    protected ?string $bun = null;

    /** @var ?string $fcode1 フリーコード１ */
    protected ?string $fcode1 = null;

    /** @var ?string $fcode2 フリーコード２ */
    protected ?string $fcode2 = null;

    /** @var ?int $dispkbn 表示／非表示 */
    protected ?int $dispkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getBun(): ?string
    {
        return $this->bun;
    }

    /**
     * {@inheritDoc}
     */
    public function setBun(?string $bun): static
    {
        $this->bun = $bun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcode1(): ?string
    {
        return $this->fcode1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode1(?string $fcode1): static
    {
        $this->fcode1 = $fcode1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcode2(): ?string
    {
        return $this->fcode2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode2(?string $fcode2): static
    {
        $this->fcode2 = $fcode2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDispkbn(): ?int
    {
        return $this->dispkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDispkbn(?int $dispkbn): static
    {
        $this->dispkbn = $dispkbn;
        return $this;
    }
}