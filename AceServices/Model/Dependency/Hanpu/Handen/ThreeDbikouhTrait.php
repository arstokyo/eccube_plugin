<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Trait ThreeDbikouh
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ThreeDbikouhTrait
{
    /** @var ?string $dbikouh1 伝票備考1 */
    protected ?string $dbikouh1 = null;

    /** @var ?string $dbikouh2 伝票備考2 */
    protected ?string $dbikouh2 = null;

    /** @var ?string $dbikouh3 伝票備考3 */
    protected ?string $dbikouh3 = null;

    /**
     * {@inheritDoc}
     */
    public function getDbikouh1(): ?string
    {
        return $this->dbikouh1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikouh1(?string $dbikouh1)
    {
        $this->dbikouh1 = $dbikouh1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikouh2(): ?string
    {
        return $this->dbikouh2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikouh2(?string $dbikouh2)
    {
        $this->dbikouh2 = $dbikouh2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikouh3(): ?string
    {
        return $this->dbikouh3;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikouh3(?string $dbikouh3)
    {
        $this->dbikouh3 = $dbikouh3;
        return $this;
    }
}