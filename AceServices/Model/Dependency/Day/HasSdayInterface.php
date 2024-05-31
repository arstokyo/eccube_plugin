<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 出荷日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSdayInterface
{
    /**
     * Get 出荷日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getSday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 出荷日
     *
     * @param \DateTime|string|null $sday
     * @return $this
     */
    public function setSday(\DateTime|string|null $sday): static;
}