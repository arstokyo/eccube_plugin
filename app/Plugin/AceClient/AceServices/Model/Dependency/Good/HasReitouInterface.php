<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 冷凍
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasReitouInterface
{

    /**
     * Get 冷凍
     *
     * @return int|null
     */
    public function getReitou(): ?int;

    /**
     * Set 冷凍
     *
     * @param int|null $reitou
     * @return $this
     */
    public function setReitou(?int $reitou);

}