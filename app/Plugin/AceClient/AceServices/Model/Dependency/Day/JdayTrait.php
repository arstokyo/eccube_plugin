<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 受注日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JdayTrait
{
    /** @var ?AceDateTime\AceDateTime $jday 受注日 */
    protected ?AceDateTime\AceDateTime $jday = null;

    /**
     * {@inheritDoc}
     */
    public function getJday()
    {
        return $this->jday;
    }

    /**
     * {@inheritDoc}
     */
    public function setJday($jday)
    {
        $this->jday = AceDateTime\AceDateTimeFactory::makeAceDateTime($jday);
        return $this;
    }
}