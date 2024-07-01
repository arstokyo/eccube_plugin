<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 終了日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ExecDateToTrait
{
    /** @var ?AceDateTime\AceDateTime $execDateTo 終了日時 */
    protected ?AceDateTime\AceDateTime $execDateTo = null;

    /**
     * {@inheritDoc}
     */
    public function getExecDateTo()
    {
        return $this->execDateTo;
    }

    /**
     * {@inheritDoc}
     */
    public function setExecDateTo($execDateTo)
    {
        $this->execDateTo = AceDateTime\AceDateTimeFactory::makeAceDateTime($execDateTo,"Y/m/d H:i:s");
        return $this;
    }
}