<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for NebikiTrait
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NebikiTrait
{
    /** @var ?int $nebiki 値引額 */
    protected ?int $nebiki = null;

    /**
     * {@inheritDoc}
     */
    public function getNebiki(): ?int
    {
        return $this->nebiki;
    }

    /**
     * {@inheritDoc}
     */
    public function setNebiki(?int $nebiki)
    {
        $this->nebiki = $nebiki;
        return $this;
    }
}