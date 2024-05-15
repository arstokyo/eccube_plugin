<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for Hday
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
    public function setHday(\Datetime|string|null $hday)
    {
        $this->hday = AceDateTime\AceDateTimeFactory::makeAceDateTime($hday);
        return $this;
    }
}