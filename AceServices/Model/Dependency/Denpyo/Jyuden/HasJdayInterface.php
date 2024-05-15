<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

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
    public function getJday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 受注日
     *
     * @param \DateTime|string|null $jday
     */
    public function setJday(\DateTime|string|null $jday);

}