<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Trait for ThreeDenBikou
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ThreeDenBikouTrait
{
    /** @var ?string $dbikou1 伝票備考1 */
    protected ?string $dbikou1 = null;

    /** @var ?string $dbikou2 伝票備考2 */
    protected ?string $dbikou2 = null;

    /** @var ?string $dbikou3 伝票備考3 */
    protected ?string $dbikou3 = null;

    /**
     * {@inheritDoc}
     */
    public function getDbikou1(): ?string
    {
        return $this->dbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikou1(?string $dbikou1)
    {
        $this->dbikou1 = $dbikou1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikou2(): ?string
    {
        return $this->dbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikou2(?string $dbikou2)
    {
        $this->dbikou2 = $dbikou2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikou3(): ?string
    {
        return $this->dbikou3;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikou3(?string $dbikou3)
    {
        $this->dbikou3 = $dbikou3;
        return $this;
    }
}