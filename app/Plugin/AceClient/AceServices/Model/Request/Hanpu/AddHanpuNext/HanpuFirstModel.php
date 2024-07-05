<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

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
    public function getOtodokeday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->otodokeday;
    }

    /**
     * {@inheritDoc}
    */
    public function setOtodokeday(\DateTime|string|null $otodokeday): static
    {
        $this->otodokeday = AceDateTime\AceDateTimeFactory::makeAceDateTime($otodokeday);
        return $this;
    }
}