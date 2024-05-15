<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for Day
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait DayTrait
{
    /** @var ?AceDateTime\AceDateTime $day 受注日 */
    protected ?AceDateTime\AceDateTime $day = null;

    /**
     * {@inheritDoc}
     */
    public function getDay(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->day;
    }

    /**
     * {@inheritDoc}
     */
    public function setDay(\DateTime|string|null $day)
    {
        $this->day = AceDateTime\AceDateTimeFactory::makeAceDateTime($day);
        return $this;
    }
}