<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Trait for 2送り状備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TwoOBikouTrait
{
    /** @var ?string $obikou1 送り状備考1 */
    protected ?string $obikou1 = null;
    /** @var ?string $obikou2 送り状備考2 */
    protected ?string $obikou2 = null;

    /**
     * {@inheritDoc}
     */
    public function getObikou1(): ?string
    {
        return $this->obikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setObikou1(?string $obikou1)
    {
        $this->obikou1 = $obikou1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getObikou2(): ?string
    {
        return $this->obikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setObikou2(?string $obikou2)
    {
        $this->obikou2 = $obikou2;
        return $this;
    }
}