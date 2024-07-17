<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface HanpuFirstModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanpuFirstModelInterface extends Day\HasSdayInterface
{
    /**
    * Get 初回お届け日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getOtodokeday();

    /**
     * Set 初回お届け日
     *
     * @param \DateTime|string|null $otodokeday
     */
    public function setOtodokeday($otodokeday);
}