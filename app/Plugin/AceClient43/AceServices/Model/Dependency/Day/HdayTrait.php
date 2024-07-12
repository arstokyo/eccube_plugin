<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 配送希望日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HdayTrait
{
    /** @var ?AceDateTime\AceDateTime $hday 配送希望日 */
    protected ?AceDateTime\AceDateTime $hday = null;

    /**
     * {@inheritDoc}
     */
    public function getHday()
    {
        return $this->hday;
    }

    /**
     * {@inheritDoc}
     */
    public function setHday($hday)
    {
        $this->hday = AceDateTime\AceDateTimeFactory::makeAceDateTime($hday);
        return $this;
    }
}