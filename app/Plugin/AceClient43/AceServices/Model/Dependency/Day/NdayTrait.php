<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 入金予定日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NdayTrait
{
    /** @var ?AceDateTime\AceDateTime $nday 入金予定日 */
    protected ?AceDateTime\AceDateTime $nday = null;

    /**
     * {@inheritDoc}
     */
    public function getNday()
    {
        return $this->nday;
    }

    /**
     * {@inheritDoc}
     */
    public function setNday($nday)
    {
        $this->nday = AceDateTime\AceDateTimeFactory::makeAceDateTime($nday);
        return $this;
    }
}