<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 入金予定日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasNdayInterface
{
    /**
    * Get 入金予定日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getNday();

    /**
     * Set 入金予定日
     *
     * @param \DateTime|string|null $nday
     * @return $this
     */
    public function setNday($nday);
}