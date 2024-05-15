<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Trait for Tesuu
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait TesuuTrait
{
    /** @var ?int $tesuu 手数料 */
    protected ?int $tesuu = null;

    /**
     * {@inheritDoc}
     */
    public function getTesuu(): ?int
    {
        return $this->tesuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setTesuu(?int $tesuu)
    {
        $this->tesuu = $tesuu;
        return $this;
    }
}