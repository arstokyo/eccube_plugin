<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Interface for Has 売上日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasUdayInterface
{
    /**
    * Get 売上日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getUday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 売上日
     *
     * @param \DateTime|string|null $uday
     */
    public function setUday(\DateTime|string|null $uday);

}