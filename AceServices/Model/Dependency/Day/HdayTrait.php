<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 配送希望日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HdayTrait
{
    /** @var ?AceDateTime\AceDateTime $hday 配送希望日 */
    protected ?AceDateTime\AceDateTime $hday = null;

    /**
     * {@inheritDoc}
     */
    public function getHday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->hday;
    }

    /**
     * {@inheritDoc}
     */
    public function setHday(\Datetime|string|null $hday): static
    {
        $this->hday = AceDateTime\AceDateTimeFactory::makeAceDateTime($hday);
        return $this;
    }
}