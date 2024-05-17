<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;


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
        OkuriAndNouhin\OkuriNoTrait,
        Day\SdateTrait,
        Point\PointPTrait,
        Point\PointMTrait,
        Day\HdayTrait;

    /** @var ?string $jname 受注方法 */
    protected ?string $jname = null;


    /**
     * {@inheritDoc}
     */
    public function setDay(\DateTime|string|null $day)
    {
        $this->day = AceDateTime\AceDateTimeFactory::makeAceDateTime($day,"YmdHis");
        return $this;
    }


    /**
     * {@inheritDoc}
     */
    public function getJname(): ?string
    {
        return $this->jname;
    }

    /**
     * {@inheritDoc}
     */
    public function setJname(?string $jname)
    {
        $this->jname = $jname;
        return $this;
    }


}