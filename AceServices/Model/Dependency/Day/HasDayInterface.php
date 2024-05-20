<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 受注日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasDayInterface
{
    /**
    * Get 受注日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getDay(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 受注日
     *
     * @param \DateTime|string|null $day
     * @return $this
     */
    public function setDay(\DateTime|string|null $day): static;

}