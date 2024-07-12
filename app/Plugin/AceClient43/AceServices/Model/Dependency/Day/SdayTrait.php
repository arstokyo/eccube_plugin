<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Trait for 出荷日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SdayTrait
{
    /** @var ?AceDateTime\AceDateTime $sday 出荷日 */
    protected ?AceDateTime\AceDateTime $sday = null;

    /**
     * {@inheritDoc}
     */
    public function getSday()
    {
        return $this->sday;
    }

    /**
     * {@inheritDoc}
     */
    public function setSday($sday)
    {
        $this->sday = AceDateTime\AceDateTimeFactory::makeAceDateTime($sday);
        return $this;
    }
}