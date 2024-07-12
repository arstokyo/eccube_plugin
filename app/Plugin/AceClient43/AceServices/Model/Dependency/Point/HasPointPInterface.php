<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for Has 加算ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPointPInterface
{
    /**
     * Get 加算ポイント
     *
     * @return ?int
     */
    public function getPointp(): ?int;

    /**
     * Set 加算ポイント
     *
     * @param ?int $pointp
     * @return $this
     */
    public function setPointp(?int $pointp);
}