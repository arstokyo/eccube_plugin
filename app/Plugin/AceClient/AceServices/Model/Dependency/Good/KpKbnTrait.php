<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for 欠品区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait KpKbnTrait
{

    /** @var ?int $kpKbn 欠品区分 */
    protected ?int $kpKbn = null;

    /**
     * {@inheritDoc}
     */
    public function getKpKbn(): ?int
    {
        return $this->kpKbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setKpKbn(?int $kpKbn)
    {
        $this->kpKbn = $kpKbn;
        return $this;
    }

}