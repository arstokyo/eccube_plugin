<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait KbnTrait
{
    /** @var ?int $kbn 区分 */
    protected ?int $kbn = null;

    /**
     * {@inheritDoc}
     */
    public function getKbn(): ?int
    {
        return $this->kbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setKbn(?int $kbn)
    {
        $this->kbn = $kbn;
        return $this;
    }
}