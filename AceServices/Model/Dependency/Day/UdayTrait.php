<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Trait for 売上日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UdayTrait
{
    /** @var ?AceDateTime\AceDateTime $uday 売上日 */
    protected ?AceDateTime\AceDateTime $uday = null;

    /**
     * {@inheritDoc}
     */
    public function getUday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->uday;
    }

    /**
     * {@inheritDoc}
     */
    public function setUday(\DateTime|string|null $uday): static
    {
        $this->uday = AceDateTime\AceDateTimeFactory::makeAceDateTime($uday);
        return $this;
    }
}