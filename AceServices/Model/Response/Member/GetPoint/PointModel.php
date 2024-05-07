<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Response\Member\GetPoint\PointModelInterface;


/**
 * Class PointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class PointModel implements PointModelInterface{
    /** @var string $point 会員番号 */
    private ?string $point = null;
    /**
     * Get POINT
     *
     * @return string
     */
    public function getPoint(): string
    {
        return $this->point;
    }

    /**
     * Set POINT
     *
     * @param ?string $point
     * @return void
     */
    public function setPoint(?string $point): void
    {
        $this->point = $point;
    }
}