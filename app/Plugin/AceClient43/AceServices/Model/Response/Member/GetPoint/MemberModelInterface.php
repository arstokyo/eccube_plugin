<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetPoint\PointModel;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface MemberModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface MemberModelInterface extends HasMessageModelInterface
{
    /**
    * Get Point
    *
    * @return ?Response\Member\GetPoint\PointModel
    */
    public function getPoint(): ?PointModel;

    /**
     * Set Point
     *
     * @param ?Response\Member\GetPoint\PointModel $point
     * @return void
     */
    public function setPoint(?PointModel $point): void;
}