<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 通販AceID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSyidInterface
{
    /**
     * Get 通販AceID
     *
     * @return ?int
     */
    public function getSyid(): ?int;

    /**
     * Set 通販AceID
     *
     * @param ?int $syid
     * @return $this
     */
    public function setSyid(?int $syid);
}