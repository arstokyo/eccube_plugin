<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Point;

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