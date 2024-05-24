<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model\Response\Member\GetPoint\PointModel;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
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