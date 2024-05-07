<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPoint;

/**
 * Interface PointModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface PointModelInterface
{
    /**
    * Get 会員番号
    *
    * @return ?string
    */
    public function getPoint(): ?string;

    /**
     * Set 会員番号
     *
     * @param ?string $point
     * @return void
     */
    public function setPoint(?string $point): void;
}