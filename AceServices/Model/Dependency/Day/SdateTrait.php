<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 記録日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SdateTrait
{
    /** @var ?AceDateTime\AceDateTime $sdate 記録日 */
    protected ?AceDateTime\AceDateTime $sdate = null;

    /**
     * {@inheritDoc}
     */
    public function getSdate(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->sdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setSdate(\Datetime|string|null $sdate)
    {
        $this->sdate = AceDateTime\AceDateTimeFactory::makeAceDateTime($sdate);
        return $this;
    }
}