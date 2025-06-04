<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Class for PointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class PointModel implements PointModelInterface
{
    use Point\PointMTrait;
    use Point\PointPTrait;
}
