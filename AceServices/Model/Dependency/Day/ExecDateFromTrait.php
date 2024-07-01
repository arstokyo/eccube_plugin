<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 開始日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ExecDateFromTrait
{
    /** @var ?AceDateTime\AceDateTime $execDateFrom 開始日時 */
    protected ?AceDateTime\AceDateTime $execDateFrom = null;

    /**
     * {@inheritDoc}
     */
    public function getExecDateFrom()
    {
        return $this->execDateFrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setExecDateFrom($execDateFrom)
    {
        $this->execDateFrom = AceDateTime\AceDateTimeFactory::makeAceDateTime($execDateFrom,"Y/m/d H:i:s");
        return $this;
    }
}