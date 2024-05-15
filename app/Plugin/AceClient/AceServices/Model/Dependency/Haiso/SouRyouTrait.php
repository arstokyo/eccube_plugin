<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for SouRyou
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SouRyouTrait
{
    /** @var ?int $souryou 送料 */
    protected ?int $souryou = null;

    /**
     * {@inheritDoc}
     */
    public function getSouRyou(): ?int
    {
        return $this->souryou;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouRyou(?int $souryou)
    {
        $this->souryou = $souryou;
        return $this;
    }
}