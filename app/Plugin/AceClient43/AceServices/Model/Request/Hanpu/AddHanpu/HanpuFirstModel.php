<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Class HanpuFirstModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuFirstModel implements HanpuFirstModelInterface
{
    use Day\SdayTrait;

     /** @var ?AceDateTime\AceDateTime $otodokeday 初回お届け日 */
    protected ?AceDateTime\AceDateTime $otodokeday = null;

    /**
     * {@inheritDoc}
    */
    public function getOtodokeday()
    {
        return $this->otodokeday;
    }

    /**
     * {@inheritDoc}
    */
    public function setOtodokeday($otodokeday)
    {
        $this->otodokeday = AceDateTime\AceDateTimeFactory::makeAceDateTime($otodokeday);
        return $this;
    }
}