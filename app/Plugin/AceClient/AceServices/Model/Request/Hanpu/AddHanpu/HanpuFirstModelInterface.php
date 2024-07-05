<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

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
    public function getOtodokeday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 初回お届け日
     *
     * @param \DateTime|string|null $otodokeday
     */
    public function setOtodokeday(\DateTime|string|null $otodokeday);
}