<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Model for RirekiLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiModelLevel1 implements RirekiModelLevel1Interface
{
    use Day\DayTrait,
        Denpyo\DennoTrait,
        Denpyo\DenkuTrait,
        Denpyo\DenKbnTrait,
        Denpyo\JnameTrait,
        OkuriAndNouhin\OkuriNoTrait,
        Day\SdateTrait,
        Point\PointPTrait,
        Point\PointMTrait,
        Day\HdayTrait;

    /**
     * {@inheritDoc}
     */
    public function setDay($day)
    {
        $this->day = AceDateTime\AceDateTimeFactory::makeAceDateTime($day,"YmdHis");
        return $this;
    }

}