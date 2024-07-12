<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for Has 使用ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPointMInterface
{
    /**
     * Get 使用ポイント
     *
     * @return ?int
     */
    public function getPointm(): ?int;

    /**
     * Set 使用ポイント
     *
     * @param ?int $pointm
     * @return $this
     */
    public function setPointm(?int $pointm);
}