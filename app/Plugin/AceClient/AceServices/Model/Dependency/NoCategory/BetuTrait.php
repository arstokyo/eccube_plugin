<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Betu
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BetuTrait
{
    /** @var ?int $betu 住所区分 */
    protected ?int $betu = null;

    /**
     * {@inheritDoc}
     */
    public function getBetu(): ?int
    {
        return $this->betu;
    }

    /**
     * {@inheritDoc}
     */
    public function setBetu(?int $betu)
    {
        $this->betu = $betu;
        return $this;
    }
}