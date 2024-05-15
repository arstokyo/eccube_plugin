<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

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
    public function getPointM(): ?int;

    /**
     * Set 使用ポイント
     *
     * @param ?int $pointM
     */
    public function setPointM(?int $pointM);
}