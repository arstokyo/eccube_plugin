<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 配送希望日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHdayInterface
{
    /**
    * Get 配送希望日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getHday();

    /**
     * Set 配送希望日
     *
     * @param \DateTime|string|null $hday
     * @return $this
     */
    public function setHday($hday);
}