<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 出荷予定日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasYdayInterface
{
    /**
    * Get 出荷予定日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getYday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 出荷予定日
     *
     * @param \DateTime|string|null $yday
     * @return $this
     */
    public function setYday(\DateTime|string|null $yday): static;
}