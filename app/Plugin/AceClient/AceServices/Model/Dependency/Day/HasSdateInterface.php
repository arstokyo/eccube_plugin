<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 記録日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSdateInterface
{
    /**
     * Get 記録日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getSdate(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 記録日
     *
     * @param \DateTime|string|null $sdate
     * @return $this
     */
    public function setSdate(\DateTime|string|null $sdate): static;
}