<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for Nday
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NdayTrait
{
    /** @var ?AceDateTime\AceDateTime $nday 入金予定日 */
    protected ?AceDateTime\AceDateTime $nday = null;

    /**
     * {@inheritDoc}
     */
    public function getNday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->nday;
    }

    /**
     * {@inheritDoc}
     */
    public function setNday(\DateTime|string|null $nday)
    {
        $this->nday = AceDateTime\AceDateTimeFactory::makeAceDateTime($nday);
        return $this;
    }
}