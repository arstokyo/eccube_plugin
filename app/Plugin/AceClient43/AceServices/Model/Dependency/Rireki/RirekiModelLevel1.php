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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Model for RirekiLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiModelLevel1 implements RirekiModelLevel1Interface
{
    use Day\DayTrait;
    use Denpyo\DennoTrait;
    use Denpyo\DenkuTrait;
    use Denpyo\DenKbnTrait;
    use Denpyo\JnameTrait;
    use OkuriAndNouhin\OkuriNoTrait;
    use Day\SdateTrait;
    use Point\PointPTrait;
    use Point\PointMTrait;
    use Day\HdayTrait;

    /**
     * {@inheritDoc}
     */
    public function setDay($day)
    {
        $this->day = AceDateTime\AceDateTimeFactory::makeAceDateTime($day, 'YmdHis');

        return $this;
    }
}
