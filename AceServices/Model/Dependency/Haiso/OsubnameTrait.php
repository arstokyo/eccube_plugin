<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送伝票略称
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
trait OsubnameTrait
{
    /** @var ?string $osubname 配送伝票略称 */
    protected ?string $osubname = null;

    /**
     * {@inheritDoc}
     */
    public function getOsubname(): ?int
    {
        return $this->onosubnameame;
    }

    /**
     * {@inheritDoc}
     */
    public function setOsubname(?int $osubname): static
    {
        $this->osubname = $osubname;
        return $this;
    }
}