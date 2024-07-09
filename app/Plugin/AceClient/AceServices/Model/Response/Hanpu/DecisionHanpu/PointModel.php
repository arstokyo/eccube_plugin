<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Class for PointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class PointModel implements PointModelInterface
{
    use Point\PointMTrait,
        Point\PointPTrait;
}