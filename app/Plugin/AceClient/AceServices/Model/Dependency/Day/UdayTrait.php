<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Trait for 売上日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UdayTrait
{
    /** @var ?AceDateTime\AceDateTime $uday 売上日 */
    protected ?AceDateTime\AceDateTime $uday = null;

    /**
     * {@inheritDoc}
     */
    public function getUday()
    {
        return $this->uday;
    }

    /**
     * {@inheritDoc}
     */
    public function setUday($uday)
    {
        $this->uday = AceDateTime\AceDateTimeFactory::makeAceDateTime($uday);
        return $this;
    }
}