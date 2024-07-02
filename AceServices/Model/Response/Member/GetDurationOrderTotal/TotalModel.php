<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Model for Total
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class TotalModel implements TotalModelInterface
{
    use Good\GkbnTrait;

    /** @var ?int $dentotal 伝票合計 */
    protected ?int $dentotal = null;

    /**
     * {@inheritDoc}
     */
    public function getDentotal(): ?int
    {
        return $this->dentotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setDentotal(?int $dentotal)
    {
        $this->dentotal = $dentotal;
        return $this;
    }
}