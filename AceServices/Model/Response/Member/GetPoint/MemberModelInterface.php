<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseInterface as ParentMemberModelResponseInterface;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPoint\PointModel;
use Plugin\AceClient\AceServices\Model\Response;


/**
 * Interface MemberModelInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

interface MemberModelInterface extends ParentMemberModelResponseInterface
{
    /**
    * Get Point
    *
    * @return Response\Member\GetPoint\PointModel
    */
    public function getPoint(): PointModel;

    /**
     * Set Point
     *
     * @param Response\Member\GetPoint\PointModel $point
     * @return void
     */
    public function setPoint(PointModel $point): void;
}