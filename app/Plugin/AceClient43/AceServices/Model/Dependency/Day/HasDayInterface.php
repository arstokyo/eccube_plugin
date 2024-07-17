<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

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
    public function getDay();

    /**
     * Set 受注日
     *
     * @param \DateTime|string|null $day
     * @return $this
     */
    public function setDay($day);

}