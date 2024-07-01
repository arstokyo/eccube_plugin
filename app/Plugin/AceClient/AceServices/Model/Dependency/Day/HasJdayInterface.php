<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 受注日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasJdayInterface
{
    /**
    * Get 受注日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getJday();

    /**
     * Set 受注日
     *
     * @param \DateTime|string|null $jday
     * @return $this
     */
    public function setJday($jday);
}