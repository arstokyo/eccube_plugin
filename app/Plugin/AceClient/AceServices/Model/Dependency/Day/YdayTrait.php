<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Trait for 出荷予定日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait YdayTrait
{
    /** @var ?AceDateTime\AceDateTime $yday 出荷予定日 */
    protected ?AceDateTime\AceDateTime $yday = null;

    /**
     * {@inheritDoc}
     */
    public function getYday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->yday;
    }

    /**
     * {@inheritDoc}
     */
    public function setYday(\DateTime|string|null $yday): static
    {
        $this->yday = AceDateTime\AceDateTimeFactory::makeAceDateTime($yday);
        return $this;
    }
}