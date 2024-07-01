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
    public function getOsubname(): ?string
    {
        return $this->osubname;
    }

    /**
     * {@inheritDoc}
     */
    public function setOsubname(?string $osubname)
    {
        $this->osubname = $osubname;
        return $this;
    }
}