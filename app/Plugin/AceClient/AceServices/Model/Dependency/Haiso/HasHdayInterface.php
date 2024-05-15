<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

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
    public function getHday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 配送希望日
     *
     * @param \DateTime|string|null $hday
     */
    public function setHday(\DateTime|string|null $hday);

}