<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

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
    public function getNday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 入金予定日
     *
     * @param \DateTime|string|null $nday
     */
    public function setNday(\DateTime|string|null $nday);

}