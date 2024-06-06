<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Trait For FreeCdTrait
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeCdTrait
{
    use NoCategory\NameTrait,
        Bikou\ThreeNotesTrait;

    /** @var ?int $kubun フリー項目区分 */
    protected ?int $kubun = null;

    /** @var ?string $fcid フリーマスタID */
    protected ?string $fcid = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?int
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?int $kubun): static
    {
        $this->kubun = $kubun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcid(): ?string
    {
        return $this->fcid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcid(?string $fcid): static
    {
        $this->fcid = $fcid;
        return $this;
    }
}