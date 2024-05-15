<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

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
     */
    public function setDay(\DateTime|string|null $day);

}