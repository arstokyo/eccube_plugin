<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetHktime;

use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Interface for HktimeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HktimeModelInterface extends Haiso\HasHkCodeInterface,
                                       Haiso\HasHkNameInterface
{
    /**
     * Get 時間
     *
     * @return ?int
     */
    public function getHktime(): ?int;

    /**
     * Set 時間
     *
     * @param ?int $hktime
     * @return $this
     */
    public function setHktime(?int $hktime);
}