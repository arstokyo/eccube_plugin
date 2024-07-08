<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen\HandenModelGroup1Interface;

/**
 * Interface HanpuSecondModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanpuSecondModelInterface extends HandenModelGroup1Interface
{

    /**
     * Get サイト(日単位)
     *
     * @return ?int
     */
    public function getSiteday(): ?int;

    /**
     * Set サイト(日単位)
     *
     * @param ?int $siteday
     * @return $this
     */
    public function setSiteday(?int $siteday);
}