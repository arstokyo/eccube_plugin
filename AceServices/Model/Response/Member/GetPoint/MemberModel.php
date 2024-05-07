<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseAbstract;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPoint\PointModel;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberModel extends MemberModelResponseAbstract implements MemberModelInterface
{
    /**
     * Point
     *
     * @var PointModel $point
     */
    protected ?PointModel $point  = null;

    /**
     * {@inheritDoc}
     */
    function getPoint(): ?PointModel
    {
        return $this->point;
    }

    /**
    * {@inheritDoc}
    */
    function setPoint(?PointModel $point): void
    {
        $this->point = $point;
    }
}