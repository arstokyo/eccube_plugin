<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for Has 開始日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasExecDateFromInterface
{
    /**
    * Get 開始日時
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getExecDateFrom();

    /**
     * Set 開始日時
     *
     * @param \DateTime|string|null $execDateFrom
     * @return $this
     */
    public function setExecDateFrom($execDateFrom);

}